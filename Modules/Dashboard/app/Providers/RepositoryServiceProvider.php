<?php

declare(strict_types=1);

namespace Modules\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Dashboard\Repositories\PermissionRepository;
use Modules\Dashboard\Repositories\PermissionRepositoryEloquent;
use Modules\Dashboard\Repositories\RoleRepository;
use Modules\Dashboard\Repositories\RoleRepositoryEloquent;
use Modules\Dashboard\Repositories\UserRepository;
use Modules\Dashboard\Repositories\UserRepositoryEloquent;

final class RepositoryServiceProvider extends ServiceProvider
{
    protected array $repositories = [
        UserRepository::class => UserRepositoryEloquent::class,
        PermissionRepository::class => PermissionRepositoryEloquent::class,
        RoleRepository::class => RoleRepositoryEloquent::class,
    ];

    public function register(): void
    {
        $this->registerRepositories();
    }

    public function registerRepositories(): void
    {
        foreach ($this->repositories as $interface => $eloquent) {
            $this->app->singleton($interface, $eloquent);
        }
    }
}
