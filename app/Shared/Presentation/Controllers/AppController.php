<?php

declare(strict_types=1);

namespace App\Shared\Presentation\Controllers;

use App\Shared\Application\Commands\Command;
use App\Shared\Application\Commands\CommandBus;
use App\Shared\Application\Queries\Query;
use App\Shared\Application\Queries\QueryBus;
use App\Shared\Application\Queries\QueryResult;
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
