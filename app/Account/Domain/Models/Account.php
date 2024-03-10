<?php

declare(strict_types=1);

namespace App\Account\Domain\Models;

use App\Account\Domain\Events\AccountCreatedEvent;
use App\Account\Domain\Events\AccountVerifiedEvent;
use App\Account\Domain\Models\ValueObjects\AccountLogging;
use App\Account\Domain\Models\ValueObjects\AccountVerification;
use App\Shared\Domain\Models\AggregateRoot;
use App\Shared\Domain\Models\ValueObjects\Id;
use App\Shared\Domain\Services\PasswordValidatorServiceInterface;

final class Account extends AggregateRoot
{
    private function __construct(
        public readonly Id $id,
        public AccountLogging $loggingData,
        public AccountVerification $verificationData,
        public bool $isVerified = false,
        private readonly ?int $number = null
    ) {
    }

    public static function create(Id $id, AccountLogging $loggingData, AccountVerification $verificationData): self
    {
        $account = new self($id, $loggingData, $verificationData);
        $account->raise(new AccountCreatedEvent($id, $loggingData));

        return $account;
    }

    public static function restore(
        Id $id,
        AccountLogging $loggingData,
        AccountVerification $verificationData,
        bool $isVerified,
        int $number
    ): self {
        return new self($id, $loggingData, $verificationData, $isVerified, $number);
    }

    public function isPasswordValid(string $inputPassword, PasswordValidatorServiceInterface $passwordValidator): bool
    {
        return $passwordValidator->validate($inputPassword, $this->loggingData->password);
    }

    public function verifyAccountIfTokenValid(Id $token): void
    {
        if ($this->verificationData->verificationId->toString() === $token->toString()) {
            $this->verifyAccount();
        }
    }

    private function verifyAccount(): void
    {
        $this->isVerified = true;
        $this->raise(new AccountVerifiedEvent($this->id));
    }
}
