<?php

namespace App\Commands;

use App\Commands\AbstractCommand;
use App\Dispatcher\EventDispatcher;
use App\Events\BookingPaid;
use App\Payments\PaymentFactory;
use App\Shop\TicketShop;

class PayCommand extends AbstractCommand
{

    public function handle(CommandInfo $commandInfo)
    {
        $booking = TicketShop::getInstance()->currBooking();
        if ($booking->getInfo()['booking_status'] !== 'paid') {
            $paymentInstance = PaymentFactory::make(
                mb_ucfirst($commandInfo->args[0])
            );
            $paymentInstance->pay($booking->getInfo()['total_price']);
            $booking->markPaid();
            EventDispatcher::getInstance()->dispatch(
                new BookingPaid($booking->getInfo())
            );
        } else {
            echo "Booking already paid\n";
        }


    }
}