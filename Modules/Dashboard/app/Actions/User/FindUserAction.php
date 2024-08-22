<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\User;

use App\Exceptions\NotFoundException;
use Exception;
use Modules\Dashboard\Tasks\User\FindUserTask;

final readonly class FindUserAction
{
    private FindUserTask $findUserTask;

    public function __construct(FindUserTask $findUserTask)
    {
        $this->findUserTask = $findUserTask;
    }

    /**
     * @throws NotFoundException
     */
    public function run(mixed $id): mixed
    {
        try {
            return $this->findUserTask->run($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
