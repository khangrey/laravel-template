<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Permission;

use App\Abstracts\Actions\BaseListAction;
use Modules\Dashboard\Tasks\Permission\ListPermissionsTask;

final class ListPermissionsAction extends BaseListAction
{
    public function __construct(ListPermissionsTask $listPermissionsTask)
    {
        $this->task = $listPermissionsTask;
    }
}
