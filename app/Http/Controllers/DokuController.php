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
                // debug purpose
                // return (new ApjiiTransactionSuccess($reg, $nama_file, $this->event_name))->render();
                Mail::to($reg->email)->bcc([
                    'adam.pm77@gmail.com',
                    'victormalawau@gmail.com',
                    'betharifarisha@gmail.com',
                ])->send(new ApjiiTransactionSuccess($reg, $reg->eticket, $this->event_name));
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
