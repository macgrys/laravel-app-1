<?php

declare(strict_types=1);

namespace App\Account\Presentation\Controllers\Api;

use App\Account\Application\Commands\AccountVerifyCommand;
use App\Account\Infrastructure\DTO\AccountVerifyRequest;
use App\Shared\Presentation\Controllers\AppController;

class AccountApiController extends AppController
{
    public function verifyAccount(AccountVerifyRequest $request)
    {
        $this->dispatchCommand(new AccountVerifyCommand($request->accountId, $request->verificationId));

        return response()->json([
            "response" => "Account successfully verified"
        ]);
    }
}
