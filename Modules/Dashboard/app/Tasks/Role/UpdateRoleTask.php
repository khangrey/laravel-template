<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Role;

use App\Abstracts\Tasks\BaseUpdateTask;
use Modules\Dashboard\Repositories\RoleRepository;

final class UpdateRoleTask extends BaseUpdateTask
{
    public function __construct()
    {
        $this->repository = app(RoleRepository::class);
    }
}
