<?php

namespace App\Commands;

class CommandExecuter
{
    public static self $instance;
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

    public function execute(string $command): void
    {
        try {
           $commandInfo = new CommandInfo($command);
           $cmdInstance = AbstractCommand::make($commandInfo);
           $cmdInstance->handle($commandInfo);
        } catch (\Exception $e) {
            echo "Error: ". $e -> getMessage() . "\n";
        }
    }
}