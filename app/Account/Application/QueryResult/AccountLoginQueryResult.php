<?php

declare(strict_types=1);

namespace App\Account\Application\QueryResult;

use App\Shared\Domain\Queries\QueryResult;

final readonly class AccountLoginQueryResult implements QueryResult
{
    public function __construct(
        public bool $isPasswordValid,
        public bool $isAccountVerified
    ) {
    }
}
