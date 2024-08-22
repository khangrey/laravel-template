<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Dashboard\Actions\Authentication\LogoutAction;

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
