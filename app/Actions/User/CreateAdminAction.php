<?php

namespace App\Actions\User;

use App\Exceptions\CreateResourceFailedException;
use App\Tasks\User\CreateAdminTask;

class CreateAdminAction
{
    /**
     * Задача для создание супер-пользователя.
     */
    private CreateAdminTask $task;

    /**
     * Конструктор класса.
     */
    public function __construct(CreateAdminTask $task)
    {
        $this->task = $task;
    }

    /**
     * Вызов задачи для создания супер-пользователя.
     *
     * @throws CreateResourceFailedException
     */
    public function run(string $email, string $name, string $password): mixed
    {
        return $this->task->run($email, $name, $password);
    }
}
