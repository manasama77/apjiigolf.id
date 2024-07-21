<?php

namespace App\Console\Commands;

use Milon\Barcode\DNS2D;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApjiiTransactionExpired;
use App\Mail\ApjiiTransactionSuccess;
use Illuminate\Support\Facades\Storage;

class ApjiiTournamentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apjii:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update payment status on DOKU payment gateway';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $event_name = 'APJII GOLF TOURNAMENT 7';
        $status_url = "https://api-sandbox.doku.com/orders/v1/status";
        $client_id   = config('doku.client_id_sandbox');
        $secret_key  = config('doku.secret_key_sandbox');
        if (env('APP_ENV') == 'production') {
            $status_url = "https://api.doku.com/orders/v1/status";
            $client_id   = config('doku.client_id');
            $secret_key  = config('doku.secret_key');
        }

        $regs = Registration::where('payment_status', 'pending')->get();
        Log::info($regs);

        foreach ($regs as $reg) {
            $event_name = $event_name;

            $request_timestamp = Carbon::now('UTC')->toIso8601ZuluString();

            $email        = $reg->email;
            $current_date = Carbon::now();
            $expired_date = Carbon::parse($reg->expired_date);

            // compare current date and expired date
            if ($current_date->gt($expired_date)) {
                $reg->update(['payment_status' => 'expired']);
                Mail::to($email)->bcc([
                    'adam.pm77@gmail.com',
                    'victormalawau@gmail.com',
                    'betharifarisha@gmail.com',
                ])->send(new ApjiiTransactionExpired($reg, $event_name));
            }

            $componentSignature = "Client-Id:" . $client_id . "\n" .
                "Request-Id:" . $reg->order_id . "\n" .
                "Request-Timestamp:" . $request_timestamp . "\n" .
                "Request-Target:/orders/v1/status/" . $reg->invoice_number;

            $signature = "HMACSHA256=" . base64_encode(hash_hmac('sha256', $componentSignature, $secret_key, true));

            $response = Http::withHeaders([
                'Client-Id'         => $client_id,
                'Request-Id'        => $reg->order_id,
                'Request-Timestamp' => $request_timestamp,
                'Signature'         => $signature,
                'Idempotency-Key'   => $reg->order_id,
            ])->get($status_url . '/' . $reg->invoice_number);

            if ($response->successful()) {
                $request_body   = json_decode($response->body(), true);
                $status         = $request_body['transaction']['status'];

                $reg->payment_status = strtolower($status);

                if ($status == 'SUCCESS') {
                    Mail::to($reg->email)->bcc([
                        'adam.pm77@gmail.com',
                        'victormalawau@gmail.com',
                        'betharifarisha@gmail.com',
                    ])->send(new ApjiiTransactionSuccess($reg, $reg->eticket, $event_name));
                }


                $reg->save();

                if ($status == 'EXPIRED') {
                    // debug purpose
                    // return (new ApjiiTransactionExpired($exec, $event_name))->render();
                    Mail::to($email)->bcc([
                        'adam.pm77@gmail.com',
                        'victormalawau@gmail.com',
                        'betharifarisha@gmail.com',
                    ])->send(new ApjiiTransactionExpired($reg, $event_name));
                }
            }
        }
    }
}
