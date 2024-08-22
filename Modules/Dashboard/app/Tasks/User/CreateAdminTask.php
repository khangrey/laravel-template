<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\User;

use App\Exceptions\CreateResourceFailedException;
use Modules\Dashboard\Enums\RolesEnum;

final class CreateAdminTask
{
    /**
     * Задача создание пользователя.
     */
    private CreateUserTask $createUserTask;

    /**
     * Конструктор класса.
     */
    public function __construct(CreateUserTask $createUserTask)
    {
        $this->createUserTask = $createUserTask;
    }

    /**
     * Создание супер-пользователя.
     *
     * @throws CreateResourceFailedException
     */
    public function run(string $email, string $name, string $password, string $guard = 'web'): mixed
    {
        $data = [
            'email' => $email,
            'name' => $name,
            'password' => $password,
        ];

        $user = $this->createUserTask->run($data);
        $user->assignRole(RolesEnum::SUPERUSER->value);

        return $user;
    }
}
