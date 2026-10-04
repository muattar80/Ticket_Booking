<?php

namespace App\Payments;

class PaymentFactory
{
    public static function make(string $methodName): PaymentMethod
    {
        $className = __NAMESPACE__ . '\\' . $methodName . 'PaymentMethod';
        if (!class_exists($className)) {
            return new NullPaymentMethod();
        } else {
            $paymentInstance = new $className();
        }
        return $paymentInstance;
    }

}