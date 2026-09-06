<?php

namespace App\Controllers;

use App\Commands\CommandExecuter;

class BookingController
{
    public function run()
    {
        while (true) {
            $cmd = readline("cmd: ");

            if (method_exists($this, $cmd)) {
                $this->$cmd();
            } else {
                CommandExecuter::getInstance()->execute($cmd);
            }
        }
    }

    public function exit()
        {
            exit();
        }

}