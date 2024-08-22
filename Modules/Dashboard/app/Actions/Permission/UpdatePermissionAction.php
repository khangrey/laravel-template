<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Permission;

use App\Abstracts\Actions\BaseUpdateAction;
use Modules\Dashboard\Tasks\Permission\UpdatePermissionTask;

final class UpdatePermissionAction extends BaseUpdateAction
{
    public function __construct(UpdatePermissionTask $updatePermissionTask)
    {
        $this->task = $updatePermissionTask;
    }
}
