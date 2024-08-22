<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\User;

use App\Abstracts\Tasks\BaseDeleteTask;
use Modules\Dashboard\Repositories\UserRepository;

final class DeleteUserTask extends BaseDeleteTask
{
    public function __construct()
    {
        $this->repository = app(UserRepository::class);
    }
}
