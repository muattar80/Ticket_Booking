<?php

namespace App\Commands;

class NullCommand extends AbstractCommand
{
    public function handle(CommandInfo $commandInfo): void
    {
        echo "Command not found\n";
    }
}