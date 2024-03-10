<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\Providers;

use App\Account\Domain\Repositories\AccountRepositoryInterface;
use App\Account\Infrastructure\Repositories\AccountRepository;
use Illuminate\Support\ServiceProvider;

class AccountRepositoryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
    }

    public function provides(): array
    {
        return [AccountRepositoryInterface::class];
    }
}
