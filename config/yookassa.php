<?php

return [
    'shop_id' => env('YOOKASSA_SHOP_ID'),
    'secret_key' => env('YOOKASSA_SECRET_KEY'),
    'return_url' => env('YOOKASSA_RETURN_URL', rtrim(env('APP_URL', 'http://localhost'), '/') . '/payment/success'),
    'cancel_url' => env('YOOKASSA_CANCEL_URL', rtrim(env('APP_URL', 'http://localhost'), '/') . '/payment/cancel'),
    // Отключить проверку SSL для локальной разработки на Windows (ошибка errno 60)
    'ssl_verify' => env('YOOKASSA_SSL_VERIFY', env('APP_ENV') === 'production'),
    // Email для чека, если у покупателя нет контактов
    'receipt_email' => env('YOOKASSA_RECEIPT_EMAIL', 'noreply@example.com'),
];
