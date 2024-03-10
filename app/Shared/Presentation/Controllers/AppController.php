<?php

declare(strict_types=1);

namespace App\Shared\Presentation\Controllers;

use App\Shared\Domain\Commands\Command;
use App\Shared\Domain\Commands\CommandBus;
use App\Shared\Domain\Queries\Query;
use App\Shared\Domain\Queries\QueryBus;
use App\Shared\Domain\Queries\QueryResult;
use Illuminate\Routing\Controller;

abstract class AppController extends Controller
{
    public function __construct(private CommandBus $commandBus, private QueryBus $queryBus)
    {
    }

    protected function dispatchCommand(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }

    protected function handleQuery(Query $query): QueryResult
    {
        return $this->queryBus->handle($query);
    }
}
