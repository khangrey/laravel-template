<?php

declare(strict_types=1);

namespace App\Actions\Role;

use App\Abstracts\Actions\BaseListAction;
use App\Tasks\Role\ListRolesTask;

final class ListRolesAction extends BaseListAction
{
    public function __construct(ListRolesTask $listRolesTask)
    {
        $this->task = $listRolesTask;
    }
}
