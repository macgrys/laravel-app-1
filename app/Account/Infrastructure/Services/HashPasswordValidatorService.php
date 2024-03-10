<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\Services;

use App\Shared\Domain\Services\PasswordValidatorServiceInterface;
use Illuminate\Support\Facades\Hash;

class HashPasswordValidatorService implements PasswordValidatorServiceInterface
{
    public function validate(string $inputPassword, string $validPassword): bool
    {
        return Hash::check($inputPassword, $validPassword);
    }
}
