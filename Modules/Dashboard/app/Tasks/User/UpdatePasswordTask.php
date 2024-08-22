<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\User;

use App\Exceptions\UpdateResourceFailedException;
use Exception;
use Modules\Dashboard\Models\User;

final class UpdatePasswordTask
{
    /**
     * Обновление пароля пользователя.
     *
     * @throws UpdateResourceFailedException
     */
    public function run(User $user, string $password): User
    {
        try {
            $user->update([
                'password' => bcrypt($password),
            ]);
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }

        return $user;
    }
}
