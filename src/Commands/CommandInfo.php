<?php

namespace App\Commands;

class CommandInfo
{
    public private(set) string $command;
    public private(set) array $args;

    public function __construct(string $commandStr)
    {
        $parts = explode(' ', $commandStr);
        $this->command = array_shift($parts);
        $this->args = $parts;
    }
}