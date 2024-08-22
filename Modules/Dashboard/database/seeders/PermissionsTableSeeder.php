<?php

declare(strict_types=1);

namespace Modules\Dashboard\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Dashboard\Enums\RolesEnum;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

final class PermissionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'viewAny-user', 'create-user', 'view-user', 'update-user', 'delete-user',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::findByName(RolesEnum::SUPERUSER->value)->givePermissionTo($permissions);
    }
}
