<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\PermissionRepository;
use App\Repositories\PermissionRepositoryEloquent;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

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
