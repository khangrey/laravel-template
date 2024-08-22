<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\User;

use App\Exceptions\CreateResourceFailedException;
use Modules\Dashboard\Tasks\User\CreateAdminTask;

final class CreateAdminAction
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
    public function run(string $email, string $name, string $password, string $guard = 'web'): mixed
    {
        return $this->task->run($email, $name, $password, $guard);
    }
}
