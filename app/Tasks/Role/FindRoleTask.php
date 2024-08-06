<?php

declare(strict_types=1);

namespace App\Tasks\Role;

use App\Abstracts\Tasks\BaseFindTask;
use App\Repositories\RoleRepository;

final class FindRoleTask extends BaseFindTask
{
    public function __construct()
    {
        $this->repository = app(RoleRepository::class);
    }
}
