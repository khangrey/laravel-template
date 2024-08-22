<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\User;

use App\Exceptions\UpdateResourceFailedException;
use Modules\Dashboard\Tasks\User\UpdatePasswordTask;
use Modules\Dashboard\Tasks\User\UpdatePhotoTask;
use Modules\Dashboard\Tasks\User\UpdateUserTask;

final class UpdateUserAction
{
    /**
     * Задача для изменения данных пользователя.
     */
    private UpdateUserTask $updateUserTask;

    private UpdatePasswordTask $updatePasswordTask;

    private UpdatePhotoTask $updatePhotoTask;

    /**
     * Конструктор класса.
     *
     * @return void
     */
    public function __construct(
        UpdateUserTask $updateUserTask,
        UpdatePasswordTask $updatePasswordTask,
        UpdatePhotoTask $updatePhotoTask
    ) {
        $this->updateUserTask = $updateUserTask;
        $this->updatePasswordTask = $updatePasswordTask;
        $this->updatePhotoTask = $updatePhotoTask;
    }

    /**
     * Вызов задачи для изменения данных пользователя.
     *
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): mixed
    {
        $user = $this->updateUserTask->run($data, $id);

        if (array_key_exists(key: 'password', array: $data) && $data['password']) {
            $this->updatePasswordTask->run($user, $data['password']);
        }

        if (
            array_key_exists(key: 'avatar', array: $data) &&
            $data['avatar']
        ) {
            $this->updatePhotoTask->run($user, $data['avatar']);
        }

        return $user;
    }
}
