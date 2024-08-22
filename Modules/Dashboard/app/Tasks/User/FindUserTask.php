<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\User;

use Modules\Dashboard\Repositories\UserRepository;

final readonly class FindUserTask
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function run(mixed $id): mixed
    {
        return $this->userRepository->find($id);
    }
}
