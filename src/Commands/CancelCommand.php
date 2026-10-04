<?php

namespace App\Commands;

use App\Commands\AbstractCommand;
use App\Shop\TicketShop;

class CancelCommand extends AbstractCommand
{

    /**
     * @throws \Exception
     */
    public function handle(CommandInfo $commandInfo): void
    {
        try {
            TicketShop::getInstance()->currBooking();
            TicketShop::getInstance()->cancelBooking();
            echo "Booking canceled\n";
        } catch (\Exception $e) {
            throw new \Exception("No booking found");
        }
    }
}