<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Role;

use App\Abstracts\Actions\BaseCreateAction;
use Modules\Dashboard\Tasks\Role\CreateRoleTask;

final class CreateRoleAction extends BaseCreateAction
{
    public function __construct(CreateRoleTask $createRoleTask)
    {
        $this->task = $createRoleTask;
    }
}
