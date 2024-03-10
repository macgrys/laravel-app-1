<?php

declare(strict_types=1);

namespace App\Shared\Application\Queries;

interface QueryBus
{
    public function handle(Query $query): QueryResult;
}
