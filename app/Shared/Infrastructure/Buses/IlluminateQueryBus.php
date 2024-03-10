<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Buses;

use App\Shared\Application\Queries\Query;
use App\Shared\Application\Queries\QueryBus;
use App\Shared\Application\Queries\QueryResult;

class IlluminateQueryBus extends IlluminateBus implements QueryBus
{
    public function handle(Query $query): QueryResult
    {
        return $this->handleWithBus($query);
    }
}
