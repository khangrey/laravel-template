<?php

namespace App\Tasks\User;

use App\Exceptions\UpdateResourceFailedException;
use App\Models\User;
use Exception;

class UpdatePasswordTask
{
    /**
     * Обновление пароля пользователя.
     *
     * @throws \App\Exceptions\UpdateResourceFailedException
     */
    public function run(User $user, string $password): User
    {
        try {
            $user->update([
                'password' => bcrypt($password),
            ]);
        } catch (Exception) {
            throw new UpdateResourceFailedException;
        }

        return $user;
    }
}
