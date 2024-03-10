<?php

declare(strict_types=1);

namespace App\Account\Application\CommandHandlers;

use App\Account\Application\Commands\AccountCreateCommand;
use App\Account\Domain\Models\Account;
use App\Account\Domain\Models\ValueObjects\AccountLogging;
use App\Account\Domain\Models\ValueObjects\AccountVerification;
use App\Account\Domain\Repositories\AccountRepositoryInterface;
use App\Shared\Domain\Commands\CommandHandler;
use App\Shared\Domain\Services\IdGeneratorServiceInterface;

class AccountCreateCommandHandler implements CommandHandler
{
    public function __construct(
        private AccountRepositoryInterface $repository,
        private IdGeneratorServiceInterface $idGenerator
    ) {
    }
    public function __invoke(AccountCreateCommand $command): void
    {
        $account = Account::create(
            $this->idGenerator->generate(),
            new AccountLogging($command->email, $command->password),
            new AccountVerification($this->idGenerator->generate())
        );

        $this->repository->store($account);
    }
}
