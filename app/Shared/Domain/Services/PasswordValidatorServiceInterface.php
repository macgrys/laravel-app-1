<?php

namespace App\Shared\Domain\Services;

interface PasswordValidatorServiceInterface
{
    public function validate(string $inputPassword, string $validPassword): bool;
}
