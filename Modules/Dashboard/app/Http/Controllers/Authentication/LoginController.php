<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Dashboard\Actions\Authentication\LoginAction;
use Modules\Dashboard\Http\Requests\Authentication\LoginRequest;

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
        return view(view: 'dashboard::authentication.login');
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
