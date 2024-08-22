<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Role;

use App\Abstracts\Tasks\BaseCreateTask;
use Spatie\Permission\Models\Role;

final class CreateRoleTask extends BaseCreateTask
{
    public function run(array $attributes)
    {
        return Role::create($attributes);
    }
}
