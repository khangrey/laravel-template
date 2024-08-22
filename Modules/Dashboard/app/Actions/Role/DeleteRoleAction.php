<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Role;

use App\Abstracts\Actions\BaseDeleteAction;
use Modules\Dashboard\Tasks\Role\DeleteRoleTask;

final class DeleteRoleAction extends BaseDeleteAction
{
    public function __construct(DeleteRoleTask $deleteRoleTask)
    {
        $this->task = $deleteRoleTask;
    }
}
