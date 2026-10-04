<?php

namespace App\Commands;

use App\Commands\AbstractCommand;
use App\Shop\TicketShop;
use Exception;

class RemoveCommand extends AbstractCommand
{

    /**
     * @throws Exception
     */
    public function handle(CommandInfo $commandInfo): void
    {
        TicketShop::getInstance()->currBooking()->removeTicket($commandInfo->args[0]);
    }
}