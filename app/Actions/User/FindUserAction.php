<?php

namespace App\Actions\User;

use App\Exceptions\NotFoundException;
use App\Tasks\User\FindUserTask;

readonly class FindUserAction
{
    protected FindUserTask $findUserTask;

    public function __construct(FindUserTask $findUserTask)
    {
        $this->findUserTask = $findUserTask;
    }

    /**
     * @throws \App\Exceptions\NotFoundException
     */
    public function run(mixed $id): mixed
    {
        try {
            return $this->findUserTask->run($id);
        } catch (\Exception) {
            throw new NotFoundException;
        }
    }
}
