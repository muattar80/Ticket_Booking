<?php

namespace App\Entities;

use App\Decorators\Priceable;

class Booking
{
    /** @var Priceable[] */
    public array $tickets = [];
    private BookingStatus $bookingStatus = BookingStatus::NEW;


    public function addTicket(string $ticket_num,
                              string $name,
                              int    $price,
                              int    $seat_num,
                              string $date): void
    {
        if (!$this -> bookingStatus -> canBookTicket()){

            throw new \Exception("Cannot book the ticket");
        }
        if (in_array(
            $ticket_num,
            array_map(fn($ticket) => $ticket->ticketInfo()['ticket_num'], $this->tickets))
        ) {
            echo "already added\n";
        } else {
            $this->tickets[] = new Ticket($ticket_num, $name, $price, $seat_num, $date);
            echo "Ticket added successfully\n";
        }
    }


    public function removeTicket(string $ticket_num): void
    {
        foreach ($this->tickets as $key => $ticket) {
            if ($ticket->ticketInfo()['ticket_num'] === $ticket_num) {
                unset($this->tickets[$key]);
                $this -> tickets = array_values($this->tickets);
                echo "Ticket removed successfully\n";
                return;
            }
        }

        throw new \Exception("Ticket not found");
    }

    public function getInfo(): array
    {
        $info = [
            'booking_status' => $this->bookingStatus->value,
            'tickets' => array_map(fn(Priceable $ticket) => $ticket->ticketInfo(), $this->tickets),
            'total_price' => array_sum(array_map(fn(Priceable $ticket) => $ticket->getPrice(), $this->tickets))
        ];

        $info['VAT'] = floor($info['total_price'] * 0.12);
        return $info;
    }


    public function markPaid(): void
    {
        $this->bookingStatus = BookingStatus::PAID;
    }
}