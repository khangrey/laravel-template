<?php

declare(strict_types=1);

namespace App\Actions\Role;

use App\Abstracts\Actions\BaseCreateAction;
use App\Tasks\Role\CreateRoleTask;

final class CreateRoleAction extends BaseCreateAction
{
    public function __construct(CreateRoleTask $createRoleTask)
    {
        $this->task = $createRoleTask;
    }
}
