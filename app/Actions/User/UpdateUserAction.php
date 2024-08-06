<?php

namespace App\Actions\User;

use App\Exceptions\UpdateResourceFailedException;
use App\Tasks\User\UpdatePasswordTask;
use App\Tasks\User\UpdatePhotoTask;
use App\Tasks\User\UpdateUserTask;

class UpdateUserAction
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
    public function run(array $data, int $id): mixed
    {
        $user = $this->updateUserTask->run($data, $id);

        if (array_key_exists(key: 'password', array: $data) && $data['password']) {
            $this->updatePasswordTask->run($user, $data['password']);
        }

        if (
            array_key_exists(key: 'profile_photo_path', array: $data) &&
            $data['profile_photo_path']
        ) {
            $this->updatePhotoTask->run($user, $data['profile_photo_path']);
        }

        return $user;
    }
}
