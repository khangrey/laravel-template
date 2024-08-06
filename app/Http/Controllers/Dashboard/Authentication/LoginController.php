<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard\Authentication;

use App\Actions\Authentication\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class LoginController extends Controller
{
    private LoginAction $loginAction;

    public function __construct(LoginAction $loginAction)
    {
        $this->loginAction = $loginAction;
    }

    /**
     * Показ формы для авторизации пользователя.
     */
    public function showLoginPage(): View
    {
        return view(view: 'dashboard.authentication.login');
    }

    /**
     * Авторизация пользователя.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        try {
            $this->loginAction->run($request->get('email'), $request->get('password'));
        } catch (Exception $exception) {
            notyf()->addError($exception->getMessage());

            return redirect()->route('dashboard.login');
        }

        return redirect()->route('dashboard.welcome');
    }
}
