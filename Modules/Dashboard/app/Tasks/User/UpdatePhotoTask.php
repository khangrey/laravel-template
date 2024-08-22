<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\User;

use App\Exceptions\UpdateResourceFailedException;
use Exception;
use Modules\Dashboard\Models\User;

final class UpdatePhotoTask
{
    /**
     * Обновление фотографии профиля пользователя.
     *
     * @throws UpdateResourceFailedException
     */
    public function run(User $user, string $requestKey): void
    {
        try {
            $user->updateAvatar($requestKey);
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
