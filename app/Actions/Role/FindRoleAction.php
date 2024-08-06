<?php

declare(strict_types=1);

namespace App\Actions\Role;

use App\Abstracts\Actions\BaseFindAction;
use App\Tasks\Role\FindRoleTask;

final class FindRoleAction extends BaseFindAction
{
    public function __construct(FindRoleTask $findRoleTask)
    {
        $this->task = $findRoleTask;
    }
}
