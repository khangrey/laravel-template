<?php

declare(strict_types=1);

namespace App\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Role;

final class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    public function model(): string
    {
        return Role::class;
    }

    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
