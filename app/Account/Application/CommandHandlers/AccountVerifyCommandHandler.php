<?php

declare(strict_types=1);

namespace App\Account\Application\CommandHandlers;

use App\Account\Application\Commands\AccountVerifyCommand;
use App\Account\Domain\Repositories\AccountRepositoryInterface;
use App\Shared\Application\Commands\CommandHandler;
use App\Shared\Application\Services\IdGeneratorServiceInterface;
use App\Shared\Domain\Models\ValueObjects\Id;

class AccountVerifyCommandHandler implements CommandHandler
{
    public function __construct(
        private AccountRepositoryInterface $repository,
        private IdGeneratorServiceInterface $idGenerator
    ) {

    }
    public function __invoke(AccountVerifyCommand $command): void
    {
        $account = $this->repository->getById($this->idGenerator->getFromString($command->accountId));

        $account->verifyAccountIfTokenValid(new Id($command->verificationId));

        $this->repository->update($account);
    }
}
