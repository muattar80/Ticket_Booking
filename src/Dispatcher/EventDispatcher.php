<?php

namespace App\Dispatcher;

class EventDispatcher
{
    public static self $instance;
    private array $listeners = [];
    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance(): self
    {
        self::$instance ??= new self();
        return self::$instance;
    }

    public function addListener(string $eventClass, string $listenerClass): void
    {
        if (!isset($this->listeners[$eventClass])) {
            $this->listeners[$eventClass] = [];
        }

        $this->listeners[$eventClass][] = $listenerClass;

    }

    public function dispatch(object $event): void {
        $eventClass = get_class($event);
        foreach($this->listeners[$eventClass] ?? [] as $listenerClass) {
            $listenerInstance = new $listenerClass();
            if(method_exists($listenerInstance, 'handle')) {
                $listenerInstance->handle($event);
            }
        }
    }
}