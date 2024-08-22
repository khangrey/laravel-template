<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Role;

use App\Abstracts\Actions\BaseListAction;
use Modules\Dashboard\Tasks\Role\ListRolesTask;

final class ListRolesAction extends BaseListAction
{
    public function __construct(ListRolesTask $listRolesTask)
    {
        $this->task = $listRolesTask;
    }
}
