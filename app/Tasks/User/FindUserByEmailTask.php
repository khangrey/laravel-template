<?php

namespace App\Tasks\User;

use App\Exceptions\NotFoundException;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FindUserByEmailTask
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
            throw new NotFoundException;
        }
    }
}
