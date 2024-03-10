<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Providers;

use App\Shared\Domain\Services\IdGeneratorServiceInterface;
use App\Shared\Infrastructure\Services\IdGeneratorService;
use Illuminate\Support\ServiceProvider;

class IdGeneratorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(IdGeneratorServiceInterface::class, IdGeneratorService::class);
    }

    public function provides(): array
    {
        return [IdGeneratorServiceInterface::class];
    }
}
