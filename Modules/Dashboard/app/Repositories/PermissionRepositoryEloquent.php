<?php

declare(strict_types=1);

namespace Modules\Dashboard\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

final class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    public function model(): string
    {
        return Permission::class;
    }

    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
