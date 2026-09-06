<?php

namespace App\Entities;

class Ticket
{
    public function __construct(
        public private(set) string $ticket_num,
        public private(set) string $name,
        public private(set) int $price,
        public private(set) int $seat_num,
        public private(set) string $date,
        public private(set) int $quantity,
    )
    {

    }

    public function getTotalPrice(): int
    {
        return $this->price * $this->quantity;
    }

    public function ticketInfo(): array
    {
        return [
            'ticket_num' => $this->ticket_num,
            'name' => $this->name,
            'price' => $this->price,
            'seat_num' => $this->seat_num,
            'date' => $this->date,
            'quantity' => $this->quantity,

        ];


    }
}