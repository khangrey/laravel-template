<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Role;

use App\Abstracts\Tasks\BaseDeleteTask;
use Modules\Dashboard\Repositories\RoleRepository;

final class DeleteRoleTask extends BaseDeleteTask
{
    public function __construct()
    {
        $this->repository = app(RoleRepository::class);
    }
}
