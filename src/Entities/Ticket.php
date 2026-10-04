<?php

namespace App\Entities;

use App\Decorators\Priceable;

class Ticket implements Priceable
{
    public function __construct(
        public private(set) string $ticket_num,
        public private(set) string $name,
        public private(set) int $price,
        public private(set) int $seat_num,
        public private(set) string $date
    )
    {

    }


    public function ticketInfo(): array
    {
        return [
            'ticket_num' => $this->ticket_num,
            'name' => $this->name,
            'price' => $this->getPrice(),
            'seat_num' => $this->seat_num,
            'date' => $this->date

        ];


    }

    public function getPrice(): float
    {
        return $this->price;
    }
}