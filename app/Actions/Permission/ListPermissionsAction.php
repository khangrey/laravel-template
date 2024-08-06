<?php

declare(strict_types=1);

namespace App\Actions\Permission;

use App\Abstracts\Actions\BaseListAction;
use App\Tasks\Permission\ListPermissionsTask;

final class ListPermissionsAction extends BaseListAction
{
    public function __construct(ListPermissionsTask $listPermissionsTask)
    {
        $this->task = $listPermissionsTask;
    }
}
