<?php

declare(strict_types=1);

namespace App\Account\Application\Commands;

use App\Shared\Domain\Commands\Command;

final readonly class AccountCreateCommand implements Command
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }
}
