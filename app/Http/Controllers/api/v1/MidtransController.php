<?php

namespace App\Http\Controllers\api\v1;

use Midtrans\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Registration;

class MidtransController extends Controller
{
    public function notification(Request $request)
    {
        Config::$isProduction = config('midtrans.production');
        Config::$serverKey    = config('midtrans.server_key');
        Config::$clientKey    = config('midtrans.client_key');
        Config::$isSanitized  = config('midtrans.is_sanitized');
        Config::$is3ds        = config('midtrans.is_3ds');

        $order_id     = $request->order_id;
        $status_code  = $request->status_code;
        $gross_amount = $request->gross_amount;
        $server_key   = config('midtrans.server_key');
        $combine      = $order_id . $status_code . $gross_amount . $server_key;

        $hashed = hash("sha512", $combine);

        // return response()->json([
        //     'hashed'    => $hashed,
        //     'signature' => $request->signature_key
        // ]);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == "capture") {
                $exec = Registration::where('order_id', '=', $order_id)->first();

                if ($exec) {
                    Registration::where('order_id', '=', $order_id)->update([
                        'payment_status' => 1
                    ]);
                }
            }
        }
    }
}
