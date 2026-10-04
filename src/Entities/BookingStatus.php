<?php

namespace App\Entities;

enum BookingStatus: string
{
    case NEW = 'new';
    case PAID = 'paid';

    public function canBookTicket()
    {
    return $this !== self::PAID;
    }
}
