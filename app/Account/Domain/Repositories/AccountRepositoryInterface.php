<?php

namespace App\Account\Domain\Repositories;

use App\Account\Domain\Models\Account;
use App\Shared\Domain\Models\ValueObjects\Id;

interface AccountRepositoryInterface
{
    public function store(Account $account): void;

    public function getById(Id $accountId): Account;

    public function getByEmail(string $email): Account;
}
