<?php

namespace App\Commands;

use App\Commands\AbstractCommand;
use App\Decorators\InsuranceDecorator;
use App\Shop\TicketShop;

class InsuranceCommand extends AbstractCommand
{

    public function handle(CommandInfo $commandInfo)
    {
        $booking = TicketShop::getInstance()->currBooking();
        foreach ($booking->tickets as $key => $ticket) {
            $booking->tickets[$key] = new InsuranceDecorator($ticket);
        }
    }
}