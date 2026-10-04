<?php

namespace App\Payments;

interface PaymentMethod
{
    public function pay(float $amount);
}