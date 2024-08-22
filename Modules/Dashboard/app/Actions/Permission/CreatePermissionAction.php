<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Permission;

use App\Abstracts\Actions\BaseCreateAction;
use Modules\Dashboard\Tasks\Permission\CreatePermissionTask;

final class CreatePermissionAction extends BaseCreateAction
{
    public function __construct(CreatePermissionTask $createPermissionTask)
    {
        $this->task = $createPermissionTask;
    }
}
