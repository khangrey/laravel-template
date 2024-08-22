<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\User;

use App\Exceptions\NotFoundException;
use Modules\Dashboard\Tasks\User\FindUserByEmailTask;

final class FindUserByEmailAction
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
