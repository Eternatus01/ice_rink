<?php

return [
    'shop_id' => env('YOOKASSA_SHOP_ID'),
    'secret_key' => env('YOOKASSA_SECRET_KEY'),
    'return_url' => env('YOOKASSA_RETURN_URL', rtrim(env('APP_URL', 'http://localhost'), '/') . '/payment/success'),
    'cancel_url' => env('YOOKASSA_CANCEL_URL', rtrim(env('APP_URL', 'http://localhost'), '/') . '/payment/cancel'),
];
