<?php

namespace App\Http\Controllers;

use App\Mail\ApjiiTransactionSuccess;
use Exception;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DokuController extends Controller
{
    private $event_name;
    private $payment_url;
    private $client_id;
    private $secret_key;

    public function __construct()
    {
        $this->event_name = 'APJII GOLF TOURNAMENT 7';
        $this->payment_url = "https://api-sandbox.doku.com/checkout/v1/payment";
        $this->client_id   = config('doku.client_id_sandbox');
        $this->secret_key  = config('doku.secret_key_sandbox');
        if (env('APP_ENV') == 'production') {
            $this->payment_url = 'https://api.doku.com/checkout/v1/payment';
            $this->client_id   = config('doku.client_id');
            $this->secret_key  = config('doku.secret_key');
        }
    }
    public function notification(Request $request)
    {
        try {
            if (!$request->header('Client-Id')) {
                throw new Exception('Client Id Not Found');
            }

            if ($request->header('Client-Id') != $this->client_id) {
                throw new Exception('Client Id Not Valid');
            }

            $header_client_id = $request->header('Client-Id');
            $request_body     = json_decode($request->getContent(), true);

            $service  = $request_body['service']['id'];
            $acquirer = $request_body['acquirer']['id'];
            $status   = $request_body['transaction']['status'];

            $invoice_number = $request_body['order']['invoice_number'];
            $reg = Registration::where('invoice_number', $invoice_number)->first();
            if (!$reg) {
                throw new Exception('Invoice Not Found');
            }

            $reg->payment_status = strtolower($status);

            if ($status == 'SUCCESS') {
                $plugin_barcode = new DNS2D();

                $bar = '<img src="data:image/png;base64,' . $plugin_barcode->getBarcodePNG($reg->barcode, 'QRCODE', 20, 20, [0, 0, 0]) . '" alt="barcode"   />';

                $data_pdf = [
                    'bar'       => $bar,
                    'barcode'   => $reg->barcode,
                    'full_name' => $reg->full_name,
                ];
                $custom_paper = [0, 0, 1000, 1778];
                $pdf          = Pdf::loadView('layouts.e_ticket', $data_pdf)->setPaper($custom_paper);
                // // DEBUG PURPOSE
                // return $pdf->stream('test.pdf', array("Attachment" => false));

                $slug_location_name = Str::slug($this->event_name);
                $content = $pdf->download()->getOriginalContent();
                $nama_file = Str::slug($reg->full_name . "-" . $reg->barcode) . ".pdf";
                Storage::disk('public')->put('eticket/' . $slug_location_name . '/' . $nama_file, $content);

                $reg->eticket = $nama_file;
                $reg->save();

                // debug purpose
                // return (new ApjiiTransactionSuccess($reg, $nama_file, $this->event_name))->render();
                Mail::to($reg->email)->bcc([
                    'adam.pm77@gmail.com',
                    'victormalawau@gmail.com',
                    'betharifarisha@gmail.com',
                ])->send(new ApjiiTransactionSuccess($reg, $nama_file, $this->event_name));
            }

            $reg->notification = $request->getContent();
            $reg->save();

            return response()->json([
                'service' => $request_body['service']['id'],
                'message' => $request_body,
            ]);
        } catch (Exception $e) {
            Log::warning($e->getMessage(), [
                'header' => $request->header(),
                'body'   => json_decode($request->getContent(), true)
            ]);
            return response()->json([
                'message' => $e->getMessage(),
                'header'  => $request->header(),
                'body'    => $request->all(),
            ]);
        }
    }
}
