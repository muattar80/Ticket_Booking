<?php

namespace App\Payments;

use App\Payments\PaymentMethod;

class BonusPaymentMethod implements PaymentMethod
{

    public function pay(float $amount)
    {
        echo "Paying $amount with bonus points\n";
    }
}