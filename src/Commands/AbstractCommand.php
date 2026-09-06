<?php

namespace App\Commands;

abstract class AbstractCommand
{
    abstract public function  handle(CommandInfo $commandInfo);
    // Single Factory or Factory Method
    public static function make(CommandInfo $commandInfo): AbstractCommand
    {
        $className = __NAMESPACE__ . '\\' . mb_ucfirst($commandInfo->command) . 'Command';
        if (class_exists($className)) {
            return new NullCommand();
        } else {
            $command = new $className();
        }
        return $command;
    }
}