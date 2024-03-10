<?php

declare(strict_types=1);

namespace App\Account\Domain\Events;

use App\Shared\Domain\Events\DomainEvent;
use App\Shared\Domain\Models\ValueObjects\Id;

readonly class AccountVerifiedEvent implements DomainEvent
{
    public function __construct(
        public Id $id
    )
    {
    }
}
