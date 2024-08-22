<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Permission;

use App\Abstracts\Tasks\BaseDeleteTask;
use Modules\Dashboard\Repositories\PermissionRepository;

final class DeletePermissionTask extends BaseDeleteTask
{
    public function __construct()
    {
        $this->repository = app(PermissionRepository::class);
    }
}
