<?php

return  [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'secret' => env('PAYPAL_SECRET_ID'),
    'settings' => [
        'http.CURLOPT_CONNECTTIMEOUT' => 30,
        'mode' => 'sandbox',
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/PayPal.log',
        'log.LogLevel' => 'DEBUG'
    ],
    'curency' => 'USD',
    'order_method' => [
        'basic' => 1,
        'paypal' => 2
    ],
];
