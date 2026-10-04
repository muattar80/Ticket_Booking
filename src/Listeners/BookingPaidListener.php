<?php

namespace App\Listeners;

use App\Events\BookingPaid;

class BookingPaidListener
{
    public function handle(BookingPaid $event): void
    {
        echo "For Admin:\tBooking paid, total sum: {$event->bookingInfo['total_price']}\n";
    }
}