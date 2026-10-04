<?php

namespace App\Commands;

use App\Commands\AbstractCommand;
use App\Entities\Booking;
use App\Shop\TicketShop;

class ShowCommand extends AbstractCommand
{

    public function handle(CommandInfo $commandInfo)
    {
        $bookingInfo = TicketShop::getInstance()->currBooking()->getInfo();

        echo "============================================\n";
        echo "              BOOKING INFORMATION           \n";
        echo "============================================\n";
        echo "Booking Status: $bookingInfo[booking_status]\n";
        echo "*****************************************\n";
        foreach ($bookingInfo['tickets'] as $ticket) {
            printf(
                "Ticket #: %-10s\n" .
                "Name:     %-20s\n" .
                "Price:    %d\n" .
                "Seat:     %-10s\n" .
                "Date:     %s\n",
                $ticket['ticket_num'],
                $ticket['name'],
                $ticket['price'],
                $ticket['seat_num'],
                $ticket['date']
            );
            echo "*****************************************\n";
        }
        echo "Total price: $bookingInfo[total_price]\n";
        echo "VAT:         $bookingInfo[VAT]\n";
        echo "============================================\n";
    }
}