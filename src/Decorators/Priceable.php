<?php

namespace App\Decorators;

interface Priceable
{
    public function getPrice(): float;
    public function ticketInfo(): array;
}