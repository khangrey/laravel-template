<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\Permission;

use App\Abstracts\Tasks\BaseCreateTask;
use Spatie\Permission\Models\Permission;

final class CreatePermissionTask extends BaseCreateTask
{
    public function run(array $attributes)
    {
        return Permission::create($attributes);
    }
}
