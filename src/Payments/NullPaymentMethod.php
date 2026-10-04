<?php

namespace App\Payments;

class NullPaymentMethod implements PaymentMethod
{

    public function pay(float $amount)
    {
       echo "Payment method not found\n";
    }
}