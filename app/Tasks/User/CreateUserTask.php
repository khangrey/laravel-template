<?php

namespace App\Tasks\User;

use App\Exceptions\CreateResourceFailedException;
use App\Repositories\UserRepository;
use Exception;

class CreateUserTask
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
     * Создание пользователя.
     *
     * @throws CreateResourceFailedException
     */
    public function run(array $data): mixed
    {
        try {
            return $this->userRepository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException;
        }
    }
}
