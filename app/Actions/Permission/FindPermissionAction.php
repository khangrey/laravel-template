<?php

declare(strict_types=1);

namespace App\Actions\Permission;

use App\Abstracts\Actions\BaseFindAction;
use App\Tasks\Permission\FindPermissionTask;

final class FindPermissionAction extends BaseFindAction
{
    public function __construct(FindPermissionTask $findPermissionTask)
    {
        $this->task = $findPermissionTask;
    }
}
