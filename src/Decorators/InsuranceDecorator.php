<?php

namespace App\Decorators;

use App\Decorators\Priceable;

class InsuranceDecorator implements Priceable
{

    public function __construct(
        private Priceable $ticket
    ) {}
    public function getPrice(): float
    {
        return $this->ticket->getPrice() + 1200;
    }

    public function ticketInfo(): array
    {
        $info = $this->ticket->ticketInfo();
        $info['price'] = $this->getPrice();

        return $info;
    }
}