<?php

declare(strict_types=1);

namespace App\Account\Application\Commands;

use App\Shared\Domain\Commands\Command;

final readonly class AccountVerifyCommand implements Command
{
    public function __construct(
        public string $accountId,
        public string $verificationId
    )
    {
    }
}
