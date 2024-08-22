<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Permission;

use App\Abstracts\Tasks\BaseListTask;
use Modules\Dashboard\Repositories\PermissionRepository;

final class ListPermissionsTask extends BaseListTask
{
    public function __construct()
    {
        $this->repository = app(PermissionRepository::class);
    }
}
