<?php

declare(strict_types=1);

namespace App\Tasks\Role;

use App\Abstracts\Tasks\BaseDeleteTask;
use App\Repositories\RoleRepository;

final class DeleteRoleTask extends BaseDeleteTask
{
    public function __construct()
    {
        $this->repository = app(RoleRepository::class);
    }
}
