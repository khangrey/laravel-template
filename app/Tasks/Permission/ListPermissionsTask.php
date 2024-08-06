<?php

declare(strict_types=1);

namespace App\Tasks\Permission;

use App\Abstracts\Tasks\BaseListTask;
use App\Repositories\PermissionRepository;

final class ListPermissionsTask extends BaseListTask
{
    public function __construct()
    {
        $this->repository = app(PermissionRepository::class);
    }
}
