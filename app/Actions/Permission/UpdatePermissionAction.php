<?php

declare(strict_types=1);

namespace App\Actions\Permission;

use App\Abstracts\Actions\BaseUpdateAction;
use App\Tasks\Permission\UpdatePermissionTask;

final class UpdatePermissionAction extends BaseUpdateAction
{
    public function __construct(UpdatePermissionTask $updatePermissionTask)
    {
        $this->task = $updatePermissionTask;
    }
}
