<?php

namespace App\Shop;

use App\Entities\Booking;

class TicketShop
{
    public static self $instance;
    private ?Booking $booking = null;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        self::$instance ??= new self();
        return self::$instance;
    }

    public function newBooking(): void
    {
        $this->booking = new Booking();
    }

    public function createBooking(): Booking
    {
        if (!$this->booking){
            throw new \Exception("Booking not created");
        }
        return $this->booking;
    }
}