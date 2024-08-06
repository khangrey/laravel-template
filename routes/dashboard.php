<?php

declare(strict_types=1);

use App\Http\Controllers\Dashboard\Authentication\LoginController;
use App\Http\Controllers\Dashboard\Authentication\LogoutController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\Profile\UpdateController as ProfileUpdateController;
use App\Http\Controllers\Dashboard\Role\UpdatePermissionsController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\WelcomeController;

Route::group(
    ['prefix' => 'auth', 'middleware' => 'guest.dashboard'],
    function (): void {
        Route::get('login', [LoginController::class, 'showLoginPage'])
            ->name('dashboard.login');
        Route::post('login', [LoginController::class, 'login'])
            ->name('dashboard.login');
    }
);

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth.dashboard'], function (): void {
    Route::delete('auth/logout', LogoutController::class)
        ->name('dashboard.logout');

    Route::get('', WelcomeController::class)
        ->name('dashboard.welcome');

    Route::singleton('profile', ProfileUpdateController::class, ['as' => 'dashboard'])
        ->except('show');

    Route::apiResource('permissions', PermissionController::class, ['as' => 'dashboard'])->except('show');

    Route::apiResource('roles', RoleController::class, ['as' => 'dashboard'])->except('show');
    Route::put('roles/{role}/permissions', UpdatePermissionsController::class)->name('dashboard.roles.update-permissions');
});
