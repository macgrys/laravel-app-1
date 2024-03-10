<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\Repositories;

use App\Account\Domain\Models\Account;
use App\Account\Domain\Repositories\AccountRepositoryInterface;
use App\Account\Infrastructure\Mappers\AccountMapper;
use App\Account\Infrastructure\Models\AccountEloquentModel;
use App\Account\Infrastructure\Models\AccountNumberEloquentModel;
use App\Account\Infrastructure\Models\AccountVerificationEloquentModel;
use App\Shared\Domain\Models\ValueObjects\Id;

class AccountRepository implements AccountRepositoryInterface
{
    public function store(Account $account): void
    {
        $accountEloquent = AccountMapper::fromDomainToEloquent($account);
        $accountEloquent->save();

        $accountEloquent->number()->save(new AccountNumberEloquentModel());

        $accountVerification = new AccountVerificationEloquentModel();
        $accountVerification->verification_id = $account->verificationData->verificationId->toString();
        $accountEloquent->verification()->save($accountVerification);
    }

    public function update(Account $account): void
    {
        $accountEloquent = AccountMapper::fromDomainToEloquent($account);
        $accountEloquent->save();
    }

    public function getById(Id $accountId): Account
    {
        /** @var AccountEloquentModel $accountEloquent */
        $accountEloquent = AccountEloquentModel::query()->findOrFail($accountId->toString());

        return AccountMapper::fromEloquentToDomain($accountEloquent);
    }

    public function getByEmail(string $email): Account
    {
        /** @var AccountEloquentModel $accountEloquent */
        $accountEloquent = AccountEloquentModel::query()->where('email', $email)->firstOrFail();

        return AccountMapper::fromEloquentToDomain($accountEloquent);
    }
}
