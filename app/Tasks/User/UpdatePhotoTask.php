<?php

namespace App\Tasks\User;

use App\Exceptions\UpdateResourceFailedException;
use App\Models\User;
use Exception;

class UpdatePhotoTask
{
    /**
     * Обновление фотографии профиля пользователя.
     *
     * @throws \App\Exceptions\UpdateResourceFailedException
     */
    public function run(User $user, string $requestKey): void
    {
        try {
            $user->updateAvatar($requestKey);
        } catch (Exception) {
            throw new UpdateResourceFailedException;
        }
    }
}
