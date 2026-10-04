<?php

namespace App\Commands;

use App\Shop\TicketShop;

class CreateCommand extends AbstractCommand
{

    public function handle(CommandInfo $commandInfo)
    {
        TicketShop::getInstance()->newBooking();
        echo "Booking created\n";
    }
}