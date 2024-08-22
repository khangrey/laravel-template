<?php

declare(strict_types=1);

namespace Modules\Dashboard\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Dashboard\Enums\RolesEnum;
use Spatie\Permission\Models\Role;

final class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::findOrCreate(RolesEnum::SUPERUSER->value);
        Role::findOrCreate(RolesEnum::USER->value);
    }
}
