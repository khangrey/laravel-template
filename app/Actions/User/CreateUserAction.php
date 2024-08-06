<?php

namespace App\Actions\User;

use App\Exceptions\CreateResourceFailedException;
use App\Tasks\User\CreateUserTask;

class CreateUserAction
{
    /**
     * Задача для создания пользователя.
     */
    private CreateUserTask $task;

    /**
     * Конструктор класса.
     */
    public function __construct(CreateUserTask $task)
    {
        $this->task = $task;
    }

    /**
     * Вызов задачи для создания пользователя.
     *
     * @throws CreateResourceFailedException
     */
    public function run(array $data): mixed
    {
        return $this->task->run($data);
    }
}
