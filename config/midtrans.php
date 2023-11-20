<?php

return [
    'id_merchant'  => env('MIDTRANS_ID_MERCHANT'),
    'client_key'   => env('MIDTRANS_CLIENT_KEY'),
    'server_key'   => env('MIDTRANS_SERVER_KEY'),
    'production'   => env('MIDTRANS_PRODUCTION'),
    'is_sanitized' => env('MIDTRANS_IS_SANITIZED'),
    'is_3ds'       => env('MIDTRANS_IS_3DS'),
];
