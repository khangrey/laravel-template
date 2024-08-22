<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Permission;

use App\Abstracts\Tasks\BaseUpdateTask;
use Modules\Dashboard\Repositories\PermissionRepository;

final class UpdatePermissionTask extends BaseUpdateTask
{
    public function __construct()
    {
        $this->repository = app(PermissionRepository::class);
    }
}
