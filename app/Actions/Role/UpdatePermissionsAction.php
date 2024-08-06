<?php

declare(strict_types=1);

namespace App\Actions\Role;

use App\Exceptions\UpdateResourceFailedException;
use App\Tasks\Role\UpdatePermissionsTask;
use Exception;
use Spatie\Permission\Models\Role;

final class UpdatePermissionsAction
{
    private UpdatePermissionsTask $updatePermissionsTask;

    public function __construct(UpdatePermissionsTask $updatePermissionsTask)
    {
        $this->updatePermissionsTask = $updatePermissionsTask;
    }

    public function run(array $attributes, Role $role): void
    {
        try {
            $this->updatePermissionsTask->run($attributes, $role);
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
