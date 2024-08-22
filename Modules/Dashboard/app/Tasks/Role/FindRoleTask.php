<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Role;

use App\Abstracts\Tasks\BaseFindTask;
use Modules\Dashboard\Repositories\RoleRepository;

final class FindRoleTask extends BaseFindTask
{
    public function __construct()
    {
        $this->repository = app(RoleRepository::class);
    }
}
