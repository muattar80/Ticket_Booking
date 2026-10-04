<?php

namespace App\Decorators;

use App\Decorators\Priceable;

class PromocodeDecorator implements Priceable
{
    public function __construct(
        private Priceable $ticket,
        private int $percent
    ) {}

    public function getPrice(): float
    {
        return $this->ticket->getPrice() * (1 - $this->percent / 100) ;
    }

    public function ticketInfo(): array
    {
        $info = $this->ticket->ticketInfo();
        $info['price'] = $this->getPrice();

        return $info;
    }
}