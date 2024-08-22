<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\User;

use App\Exceptions\UpdateResourceFailedException;
use Exception;
use Modules\Dashboard\Repositories\UserRepository;

final class UpdateUserTask
{
    /**
     * Репозиторий модели "App\Models\User".
     */
    private UserRepository $userRepository;

    /**
     * Конструктор класса.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Изменения данных пользователя.
     *
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, int $id): mixed
    {
        try {
            return $this->userRepository->update(
                [
                    'email' => $data['email'],
                    'name' => $data['name'],
                ],
                $id
            );
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
