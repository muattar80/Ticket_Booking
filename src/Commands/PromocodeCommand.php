<?php

namespace App\Commands;

use App\Commands\AbstractCommand;
use App\Decorators\InsuranceDecorator;
use App\Decorators\PromocodeDecorator;
use App\Shop\TicketShop;

class PromocodeCommand extends AbstractCommand
{

    public function handle(CommandInfo $commandInfo)
    {
        $booking = TicketShop::getInstance()->currBooking();
        foreach ($booking->tickets as $key => $ticket) {
            if ($ticket->ticketInfo()['ticket_num'] === $commandInfo->args[0]) {
                $booking->tickets[$key] = new PromocodeDecorator($ticket, $commandInfo->args[1]);
            }
        }
    }
}