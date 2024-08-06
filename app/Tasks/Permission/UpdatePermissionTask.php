<?php

declare(strict_types=1);

namespace App\Tasks\Permission;

use App\Abstracts\Tasks\BaseUpdateTask;
use App\Repositories\PermissionRepository;

final class UpdatePermissionTask extends BaseUpdateTask
{
    public function __construct()
    {
        $this->repository = app(PermissionRepository::class);
    }
}
