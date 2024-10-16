<?php

namespace App\Http\Controllers\Payment;

use YooKassa\Client;
use YooKassa\Request\Payments\CreatePaymentResponse;

class CreatePaymentController
{
  public function __invoke(): ?CreatePaymentResponse
  {
    $client = new Client();
    $client->setAuth(env('SHOP_ID'), evn('SHOP_SECRET_KEY'));

    return $client->createPayment($this->getPaymentData('1000.00'));
  }

  private function getPaymentData(string $value): array
  {
    return [
      'amount' => [
        'value' => $value,
        'currency' => 'RUB',
      ],
    ];
  }
}
