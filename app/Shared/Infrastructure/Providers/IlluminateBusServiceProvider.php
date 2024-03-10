<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Providers;

use App\Account\Application\CommandHandlers\AccountCreateCommandHandler;
use App\Account\Application\CommandHandlers\AccountVerifyCommandHandler;
use App\Account\Application\Commands\AccountCreateCommand;
use App\Account\Application\Commands\AccountVerifyCommand;
use App\Account\Application\Query\AccountLoginQuery;
use App\Account\Application\QueryHandler\AccountLoginQueryHandler;
use App\Shared\Application\Commands\CommandBus;
use App\Shared\Application\Queries\QueryBus;
use App\Shared\Infrastructure\Buses\IlluminateCommandBus;
use App\Shared\Infrastructure\Buses\IlluminateQueryBus;
use Illuminate\Bus\BusServiceProvider;

class IlluminateBusServiceProvider extends BusServiceProvider
{
    public function register(): void
    {
        parent::register();

        $this->app->singleton(CommandBus::class, IlluminateCommandBus::class);
        $this->app->singleton(QueryBus::class, IlluminateQueryBus::class);

        $commandBus = $this->app->make(CommandBus::class);
        $commandBus->map([
            AccountCreateCommand::class => AccountCreateCommandHandler::class,
            AccountVerifyCommand::class => AccountVerifyCommandHandler::class
        ]);

        $queryBus = $this->app->make(QueryBus::class);
        $queryBus->map([
            AccountLoginQuery::class => AccountLoginQueryHandler::class
        ]);
    }

    public function provides(): array
    {
        return [
            ...parent::provides(),
            CommandBus::class,
            QueryBus::class
        ];
    }
}
