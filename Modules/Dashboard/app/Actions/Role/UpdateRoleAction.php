<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Role;

use App\Abstracts\Actions\BaseUpdateAction;
use Modules\Dashboard\Tasks\Role\UpdateRoleTask;

final class UpdateRoleAction extends BaseUpdateAction
{
    public function __construct(UpdateRoleTask $updateRoleTask)
    {
        $this->task = $updateRoleTask;
    }
}
