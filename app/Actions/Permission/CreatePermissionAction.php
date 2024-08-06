<?php

declare(strict_types=1);

namespace App\Actions\Permission;

use App\Abstracts\Actions\BaseCreateAction;
use App\Tasks\Permission\CreatePermissionTask;

final class CreatePermissionAction extends BaseCreateAction
{
    public function __construct(CreatePermissionTask $createPermissionTask)
    {
        $this->task = $createPermissionTask;
    }
}
