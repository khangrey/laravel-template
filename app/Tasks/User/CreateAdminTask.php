<?php

namespace App\Tasks\User;

use App\Enums\RolesEnum;
use App\Exceptions\CreateResourceFailedException;

class CreateAdminTask
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
    public function run(string $email, string $name, string $password): mixed
    {
        $data = [
            'email' => $email,
            'name' => $name,
            'password' => $password,
        ];

        $user = $this->createUserTask->run($data);
        $user->assignRole(RolesEnum::SUPERUSER);

        return $user;
    }
}
