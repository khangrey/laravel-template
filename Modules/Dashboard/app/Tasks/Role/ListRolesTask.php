<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Role;

use App\Abstracts\Tasks\BaseListTask;
use Modules\Dashboard\Repositories\RoleRepository;

final class ListRolesTask extends BaseListTask
{
    public function __construct()
    {
        $this->repository = app(RoleRepository::class);
    }
}
