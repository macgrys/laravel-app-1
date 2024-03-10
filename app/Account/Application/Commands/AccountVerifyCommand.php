<?php

declare(strict_types=1);

namespace App\Account\Application\Commands;

final readonly class AccountVerifyCommand implements \App\Shared\Application\Commands\Command
{
    public function __construct(
        public string $accountId,
        public string $verificationId
    )
    {
    }
}
