<?php

declare(strict_types=1);

namespace App\Tasks\Role;

use App\Abstracts\Tasks\BaseUpdateTask;
use App\Repositories\RoleRepository;

final class UpdateRoleTask extends BaseUpdateTask
{
    public function __construct()
    {
        $this->repository = app(RoleRepository::class);
    }
}
