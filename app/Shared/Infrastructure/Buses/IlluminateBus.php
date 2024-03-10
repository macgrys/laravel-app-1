<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Buses;

use App\Shared\Application\Queries\QueryResult;
use Illuminate\Bus\Dispatcher;

abstract class IlluminateBus
{
    public function __construct(private Dispatcher $bus)
    {
    }

    protected function dispatchToBus($command): void
    {
        $this->bus->dispatch($command);
    }

    protected function handleWithBus($query): QueryResult
    {
        return $this->bus->dispatch($query);
    }

    public function map(array $map): void
    {
        $this->bus->map($map);
    }
}
