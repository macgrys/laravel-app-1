<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\Mappers;

use App\Account\Domain\Models\Account;
use App\Account\Domain\Models\ValueObjects\AccountLogging;
use App\Account\Domain\Models\ValueObjects\AccountVerification;
use App\Account\Infrastructure\Models\AccountEloquentModel;
use App\Shared\Domain\Models\ValueObjects\Id;

class AccountMapper
{
   public static function fromDomainToEloquent(Account $account): AccountEloquentModel
    {
        $accountEloquent = AccountEloquentModel::query()->find($account->id->toString());

        if (!$accountEloquent) {
            $accountEloquent = new AccountEloquentModel();
            $accountEloquent->id = $account->id->toString();
            $accountEloquent->email = $account->loggingData->email;
            $accountEloquent->password = $account->loggingData->password;
        }

        $accountEloquent->is_verified = $account->isVerified;

        return $accountEloquent;
    }

    public static function fromEloquentToDomain(AccountEloquentModel $account): Account
    {
        return Account::restore(
            new Id($account->id),
            new AccountLogging($account->email, $account->password),
            new AccountVerification(new Id($account->verification()->get()->first()->verification_id)),
            !!$account->is_verified,
            $account->number()->get()->first()->number
        );
    }
}
