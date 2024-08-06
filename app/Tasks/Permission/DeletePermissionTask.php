<?php

declare(strict_types=1);

namespace App\Tasks\Permission;

use App\Abstracts\Tasks\BaseDeleteTask;
use App\Repositories\PermissionRepository;

final class DeletePermissionTask extends BaseDeleteTask
{
    public function __construct()
    {
        $this->repository = app(PermissionRepository::class);
    }
}
