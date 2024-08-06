<?php

declare(strict_types=1);

namespace App\Actions\Authentication;

use App\Exceptions\LoginFailedException;
use App\Tasks\Authentication\LoginTask;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

final class LoginAction
{
    /**
     * Задача для авторизации пользователя.
     */
    private LoginTask $task;

    /**
     * Конструктор класса.
     */
    public function __construct(LoginTask $task)
    {
        $this->task = $task;
    }

    /**
     * Выполнение действии для авторизации пользователя.
     *
     * @throws LoginFailedException
     */
    public function run(
        string $email,
        string $password,
        string $guard = 'web'
    ): ?Authenticatable {
        $loggedIn = $this->task->run($email, $password, $guard);

        if ( ! $loggedIn) {
            throw new LoginFailedException();
        }

        return Auth::user();
    }
}
