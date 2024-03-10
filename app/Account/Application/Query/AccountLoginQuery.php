<?php

declare(strict_types=1);

namespace App\Account\Application\Query;

use App\Shared\Domain\Queries\Query;
use App\Shared\Domain\Services\PasswordValidatorServiceInterface;

final readonly class AccountLoginQuery implements Query
{
    public function __construct(
        public string $email,
        public string $password,
        public PasswordValidatorServiceInterface $passwordValidatorService
    ) {
    }
}
