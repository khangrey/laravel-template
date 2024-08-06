<?php

declare(strict_types=1);

namespace App\Actions\Role;

use App\Abstracts\Actions\BaseUpdateAction;
use App\Tasks\Role\UpdateRoleTask;

final class UpdateRoleAction extends BaseUpdateAction
{
    public function __construct(UpdateRoleTask $updateRoleTask)
    {
        $this->task = $updateRoleTask;
    }
}
