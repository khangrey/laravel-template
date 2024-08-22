<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Permission;

use App\Abstracts\Actions\BaseFindAction;
use Modules\Dashboard\Tasks\Permission\FindPermissionTask;

final class FindPermissionAction extends BaseFindAction
{
    public function __construct(FindPermissionTask $findPermissionTask)
    {
        $this->task = $findPermissionTask;
    }
}
