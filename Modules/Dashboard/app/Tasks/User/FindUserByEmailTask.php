<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\User;

use App\Exceptions\NotFoundException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Dashboard\Repositories\UserRepository;

final class FindUserByEmailTask
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
     * Поиск пользователя по почте.
     *
     * @throws NotFoundException
     */
    public function run(string $email): mixed
    {
        try {
            return $this->userRepository->findByField('email', $email);
        } catch (ModelNotFoundException|Exception) {
            throw new NotFoundException();
        }
    }
}
