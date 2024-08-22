<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\Role;

use App\Abstracts\Actions\BaseFindAction;
use Modules\Dashboard\Tasks\Role\FindRoleTask;

final class FindRoleAction extends BaseFindAction
{
    public function __construct(FindRoleTask $findRoleTask)
    {
        $this->task = $findRoleTask;
    }
}
