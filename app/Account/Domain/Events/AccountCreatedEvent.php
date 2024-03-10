<?php

declare(strict_types=1);

namespace App\Account\Domain\Events;

use App\Account\Domain\Models\ValueObjects\AccountLogging;
use App\Shared\Domain\Events\DomainEvent;
use App\Shared\Domain\Models\ValueObjects\Id;

readonly class AccountCreatedEvent implements DomainEvent
{
    public function __construct(
        public Id $id,
        public AccountLogging $loggingData
    )
    {
    }
}
