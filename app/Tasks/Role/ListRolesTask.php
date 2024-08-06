<?php

declare(strict_types=1);

namespace App\Tasks\Role;

use App\Abstracts\Tasks\BaseListTask;
use App\Repositories\RoleRepository;

final class ListRolesTask extends BaseListTask
{
    public function __construct()
    {
        $this->repository = app(RoleRepository::class);
    }
}
