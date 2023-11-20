<?php

namespace App\Http\Controllers\api\v1;

use Midtrans\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    }
}
