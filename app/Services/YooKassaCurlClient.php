<?php

namespace App\Services;

use YooKassa\Client\CurlClient;

class YooKassaCurlClient extends CurlClient
{
    public function setAdvancedCurlOptions(): void
    {
        if (!config('yookassa.ssl_verify', true)) {
            $this->setCurlOption(CURLOPT_SSL_VERIFYPEER, false);
            $this->setCurlOption(CURLOPT_SSL_VERIFYHOST, false);
        }
    }
}
