<?php

declare(strict_types=1);

namespace App\Shared\Domain\Models;

use App\Shared\Domain\Events\DomainEvent;

abstract class AggregateRoot
{
    private array $events = [];

    public function pullEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

    protected function raise(DomainEvent $event): void
    {
        $this->events[] = $event;
    }
}
