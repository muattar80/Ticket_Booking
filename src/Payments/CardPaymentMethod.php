<?php

namespace App\Payments;

use App\Payments\PaymentMethod;

class CardPaymentMethod implements PaymentMethod
{

    public function pay(float $amount): void
    {
        echo "Paying $amount with card\n";
    }
}