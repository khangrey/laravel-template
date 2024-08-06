<?php

namespace App\Tasks\User;

use App\Repositories\UserRepository;

readonly class FindUserTask
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function run(mixed $id): mixed
    {
        return $this->userRepository->find($id);
    }
}
