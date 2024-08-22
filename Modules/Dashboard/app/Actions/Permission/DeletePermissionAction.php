<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Permission;

use App\Abstracts\Actions\BaseDeleteAction;
use Modules\Dashboard\Tasks\Permission\DeletePermissionTask;

final class DeletePermissionAction extends BaseDeleteAction
{
    public function __construct(DeletePermissionTask $deletePermissionTask)
    {
        $this->task = $deletePermissionTask;
    }
}
