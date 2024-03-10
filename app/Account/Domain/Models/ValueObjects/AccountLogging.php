<?php

declare(strict_types=1);

namespace App\Account\Domain\Models\ValueObjects;

readonly class AccountLogging
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }
}
