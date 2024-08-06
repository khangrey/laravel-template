<?php

declare(strict_types=1);

namespace App\Actions\Authentication;

use Illuminate\Support\Facades\Auth;

final class LogoutAction
{
    /**
     * Выполение действии для выхода из системы.
     */
    public function run(): void
    {
        Auth::logout();
    }
}
