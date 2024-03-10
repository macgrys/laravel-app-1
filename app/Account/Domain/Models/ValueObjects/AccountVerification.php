<?php

declare(strict_types=1);

namespace App\Account\Domain\Models\ValueObjects;

use App\Shared\Domain\Models\ValueObjects\Id;

readonly class AccountVerification
{
    public function __construct(
        public Id $verificationId,
    )
    {
    }
}
