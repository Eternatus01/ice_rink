<?php

namespace App\Services;

use YooKassa\Client;
use YooKassa\Model\PaymentInterface;

class YooKassaService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuth(
            config('yookassa.shop_id'),
            config('yookassa.secret_key')
        );
    }

    public function createPayment(float $amount, string $description, array $metadata = [], ?string $returnUrl = null): ?PaymentInterface
    {
        if (!config('yookassa.shop_id') || !config('yookassa.secret_key')) {
            return null;
        }

        $payment = $this->client->createPayment(
            [
                'amount' => [
                    'value' => number_format($amount, 2, '.', ''),
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => $returnUrl ?? config('yookassa.return_url'),
                ],
                'capture' => true,
                'description' => $description,
                'metadata' => $metadata,
            ],
            uniqid('', true)
        );

        return $payment;
    }
}
