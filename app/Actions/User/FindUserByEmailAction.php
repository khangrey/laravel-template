<?php

namespace App\Actions\User;

use App\Exceptions\NotFoundException;
use App\Tasks\User\FindUserByEmailTask;

class FindUserByEmailAction
{
    /**
     * Задача для поиска пользователей по почте.
     */
    private FindUserByEmailTask $task;

    /**
     * Конструктор класса.
     */
    public function __construct(FindUserByEmailTask $task)
    {
        $this->task = $task;
    }

    /**
     * Вызов задачи для поиска пользователей по почте.
     *
     * @throws NotFoundException
     */
    public function run(string $email): mixed
    {
        return $this->task->run($email);
    }
}
