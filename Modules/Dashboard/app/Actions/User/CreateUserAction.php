<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\User;

use App\Exceptions\CreateResourceFailedException;
use Modules\Dashboard\Tasks\User\CreateUserTask;

final class CreateUserAction
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
