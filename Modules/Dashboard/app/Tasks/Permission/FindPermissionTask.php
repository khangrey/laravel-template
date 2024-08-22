<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Permission;

use App\Abstracts\Tasks\BaseFindTask;
use Modules\Dashboard\Repositories\PermissionRepository;

final class FindPermissionTask extends BaseFindTask
{
    public function __construct()
    {
        $this->repository = app(PermissionRepository::class);
    }
}
