<?php

namespace App\Entities;

class Booking
{
    /** @var Ticket[] */
    private array $tickets = [];
    private BookingStatus $bookingStatus = BookingStatus::NEW;


    public function addItem(  string $ticket_num,
                              string $name,
                              int $price,
                              int $seat_num,
                              string $date,
                              int $quantity)
    {
        if (!$this -> bookingStatus -> canBookTicket()){
            throw new \Exception("Cannot book the ticket");
        }
        $this->tickets[] = new Ticket($ticket_num, $name, $price, $seat_num, $date, $quantity);
    }

    public function getInfo(): array
    {
        $info = [
            'tickets' => array_map(fn(Ticket $ticket) => $ticket->ticketInfo(), $this->tickets),
            'total_price' => array_sum(array_map(
                fn(Ticket $ticket) => $ticket->getTotalPrice(),
                $this->tickets)
            )
        ];

        $info['VAT'] = floor($info['total_price'] * 0.12);
        return $info;


    }
}