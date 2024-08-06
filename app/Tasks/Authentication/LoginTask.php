<?php

namespace App\Tasks\Authentication;

use Illuminate\Support\Facades\Auth;

class LoginTask
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
