<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard\Authentication;

use App\Actions\Authentication\LogoutAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

final class LogoutController extends Controller
{
    private LogoutAction $logoutAction;

    public function __construct(LogoutAction $logoutAction)
    {
        $this->logoutAction = $logoutAction;
    }

    /**
     * Выход из системы.
     */
    public function __invoke(): RedirectResponse
    {
        $this->logoutAction->run();

        return redirect()->route('dashboard.login');
    }
}
