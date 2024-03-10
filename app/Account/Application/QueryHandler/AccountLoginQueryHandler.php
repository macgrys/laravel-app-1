<?php

declare(strict_types=1);

namespace App\Account\Application\QueryHandler;

use App\Account\Application\Query\AccountLoginQuery;
use App\Account\Application\QueryResult\AccountLoginQueryResult;
use App\Account\Domain\Repositories\AccountRepositoryInterface;
use App\Shared\Domain\Queries\QueryHandler;

class AccountLoginQueryHandler implements QueryHandler
{
    public function __construct(
        private AccountRepositoryInterface $repository
    ) {
    }

    public function handle(AccountLoginQuery $query): AccountLoginQueryResult
    {
        $account = $this->repository->getByEmail($query->email);

        $isPasswordValid = $account->isPasswordValid($query->password, $query->passwordValidatorService);
        $isAccountVerified = $account->isVerified;

        return new AccountLoginQueryResult($isPasswordValid, $isAccountVerified);
    }
}
