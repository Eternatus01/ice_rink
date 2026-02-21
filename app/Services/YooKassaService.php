<?php

namespace App\Services;

class YooKassaService
{
    private ?object $client = null;

    public function __construct()
    {
        if (!class_exists(\YooKassa\Client::class)) {
            return;
        }

        $curlClient = new YooKassaCurlClient();
        $this->client = new \YooKassa\Client($curlClient);
        $this->client->setAuth(
            config('yookassa.shop_id'),
            config('yookassa.secret_key')
        );
    }

    public function createPayment(float $amount, string $description, array $metadata = [], ?string $returnUrl = null, ?string $customerPhone = null, ?string $customerEmail = null): ?object
    {
        if (!$this->client || !config('yookassa.shop_id') || !config('yookassa.secret_key')) {
            return null;
        }

        $customer = [];
        if ($customerPhone) {
            $customer['phone'] = preg_replace('/\D/', '', $customerPhone);
            if (str_starts_with($customer['phone'], '8')) {
                $customer['phone'] = '7' . substr($customer['phone'], 1);
            }
            if (!str_starts_with($customer['phone'], '7')) {
                $customer['phone'] = '7' . $customer['phone'];
            }
        }
        if ($customerEmail) {
            $customer['email'] = $customerEmail;
        }
        if (empty($customer)) {
            $customer['email'] = config('yookassa.receipt_email', 'noreply@example.com');
        }

        $paymentData = [
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
            'receipt' => [
                'customer' => $customer,
                'items' => [
                    [
                        'description' => $description,
                        'quantity' => '1.00',
                        'amount' => [
                            'value' => number_format($amount, 2, '.', ''),
                            'currency' => 'RUB',
                        ],
                        'vat_code' => 1,
                        'payment_mode' => 'full_payment',
                        'payment_subject' => 'service',
                    ],
                ],
            ],
        ];

        $payment = $this->client->createPayment($paymentData, uniqid('', true));

        return $payment;
    }
}
