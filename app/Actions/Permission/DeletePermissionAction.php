<?php

declare(strict_types=1);

namespace App\Actions\Permission;

use App\Abstracts\Actions\BaseDeleteAction;
use App\Tasks\Permission\DeletePermissionTask;

final class DeletePermissionAction extends BaseDeleteAction
{
    public function __construct(DeletePermissionTask $deletePermissionTask)
    {
        $this->task = $deletePermissionTask;
    }
}
