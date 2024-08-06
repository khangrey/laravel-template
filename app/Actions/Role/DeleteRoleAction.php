<?php

declare(strict_types=1);

namespace App\Actions\Role;

use App\Abstracts\Actions\BaseDeleteAction;
use App\Tasks\Role\DeleteRoleTask;

final class DeleteRoleAction extends BaseDeleteAction
{
    public function __construct(DeleteRoleTask $deleteRoleTask)
    {
        $this->task = $deleteRoleTask;
    }
}
