<?php

declare(strict_types=1);

use Modules\Dashboard\Http\Controllers\Authentication\LoginController;
use Modules\Dashboard\Http\Controllers\Authentication\LogoutController;
use Modules\Dashboard\Http\Controllers\PermissionController;
use Modules\Dashboard\Http\Controllers\Profile\UpdateController as ProfileUpdateController;
use Modules\Dashboard\Http\Controllers\Role\UpdatePermissionsController;
use Modules\Dashboard\Http\Controllers\RoleController;
use Modules\Dashboard\Http\Controllers\UserController;
use Modules\Dashboard\Http\Controllers\WelcomeController;

Route::group(
    ['prefix' => 'auth', 'middleware' => 'guest.dashboard'],
    function (): void {
        Route::get('login', [LoginController::class, 'showLoginPage'])
            ->name('dashboard.login');
        Route::post('login', [LoginController::class, 'login'])
            ->name('dashboard.login.store');
    }
);

Route::group(['middleware' => 'auth.dashboard'], function (): void {
    Route::delete('auth/logout', LogoutController::class)
        ->name('dashboard.logout');

    Route::get('', WelcomeController::class)
        ->name('dashboard.welcome');

    Route::singleton('profile', ProfileUpdateController::class, ['as' => 'dashboard'])
        ->except('show');

    Route::apiResource('permissions', PermissionController::class, ['as' => 'dashboard'])->except('show');

    Route::apiResource('roles', RoleController::class, ['as' => 'dashboard'])->except('show');
    Route::put('roles/{role}/permissions', UpdatePermissionsController::class)->name('dashboard.roles.update-permissions');

    Route::resource('users', UserController::class, ['as' => 'dashboard'])->except('show');
});
