<?php

declare(strict_types=1);

namespace App\Tasks\Permission;

use App\Abstracts\Tasks\BaseFindTask;
use App\Repositories\PermissionRepository;

final class FindPermissionTask extends BaseFindTask
{
    public function __construct()
    {
        $this->repository = app(PermissionRepository::class);
    }
}
