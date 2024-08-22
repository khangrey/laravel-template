<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Authentication;

use Illuminate\Support\Facades\Auth;

final class LoginTask
{
    /**
     * Выполнения задачи для авторизации пользователя.
     */
    public function run(string $email, string $password, string $guard): bool
    {
        return Auth::guard($guard)->attempt([
            'email' => $email,
            'password' => $password,
        ]);
    }
}
