<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Role;

use Spatie\Permission\Models\Role;

final class UpdatePermissionsTask
{
    public function run(array $attributes, Role $role): void
    {
        $role->syncPermissions($attributes['permissions']);
    }
}
