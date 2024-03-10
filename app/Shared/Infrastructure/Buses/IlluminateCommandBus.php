<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Buses;

use App\Shared\Domain\Commands\Command;
use App\Shared\Domain\Commands\CommandBus;

class IlluminateCommandBus extends IlluminateBus implements CommandBus
{
    public function dispatch(Command $command): void
    {
        $this->dispatchToBus($command);
    }
}
