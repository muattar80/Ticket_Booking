<?php

namespace App\Events;

class BookingPaid
{
    public function __construct(public private(set) array $bookingInfo) {

    }
}