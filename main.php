<?php
require_once "vendor/autoload.php";

$dispatcher = \App\Dispatcher\EventDispatcher::getInstance();
$dispatcher -> addListener(
    \App\Events\BookingPaid::class,
    \App\Listeners\BookingPaidListener::class
);



$ctrl = new \App\Controllers\BookingController();
$ctrl->run();