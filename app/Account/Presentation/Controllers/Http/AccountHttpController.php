<?php

declare(strict_types=1);

namespace App\Account\Presentation\Controllers\Http;

use App\Account\Application\Commands\AccountCreateCommand;
use App\Account\Application\Query\AccountLoginQuery;
use App\Account\Application\QueryResult\AccountLoginQueryResult;
use App\Account\Infrastructure\DTO\AccountCreateRequest;
use App\Account\Infrastructure\DTO\AccountLoginRequest;
use App\Account\Infrastructure\Services\HashPasswordValidatorService;
use App\Shared\Presentation\Controllers\AppController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AccountHttpController extends AppController
{
    public function loginForm(): View
    {
        return view('login');
    }

    public function registerForm(): View
    {
        return view('register');
    }

    public function login(AccountLoginRequest $request): RedirectResponse
    {
        /** @var AccountLoginQueryResult $query */
        $query = $this->handleQuery(new AccountLoginQuery(
            $request->email(),
            $request->password(),
            new HashPasswordValidatorService()
        ));

        if (!$query->isAccountVerified) {
            Session::flash('failure', 'Konto nie jest jeszcze aktywne');
            return redirect()->back();
        }

        if ($query->isPasswordValid) {
            Session::flash('success', 'Poprawnie zalogowano');
            return redirect()->action([self::class, 'dashboard']);
        }

        Session::flash('failure', 'Nieprawidłowe dane');
        return redirect()->back();
    }

    public function register(AccountCreateRequest $request): RedirectResponse
    {
        $this->dispatchCommand(new AccountCreateCommand($request->email(), $request->password()));

        Session::flash('success', 'Utworzono konto. Logowanie będzie możliwe po jego weryfikacji');
        return redirect()->action([self::class, 'loginForm']);
    }

    public function dashboard(): View
    {
        return view('dashboard');
    }
}
