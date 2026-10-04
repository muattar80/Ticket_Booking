<?php

namespace App\Commands;

use App\Shop\TicketShop;

class AddCommand extends AbstractCommand
{

    public function handle(CommandInfo $commandInfo)
    {
        TicketShop::getInstance()->currBooking()->addTicket(
            $commandInfo->args[0],
            $commandInfo->args[1],
            $commandInfo->args[2],
            $commandInfo->args[3],
            $commandInfo->args[4]
        );

    }
}