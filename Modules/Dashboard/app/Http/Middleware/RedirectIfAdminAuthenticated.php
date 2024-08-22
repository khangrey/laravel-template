<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Dashboard\Enums\RolesEnum;
use Symfony\Component\HttpFoundation\Response;

final class RedirectIfAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(
        Request $request,
        Closure $next,
        string ...$guards
    ): Response {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (
                Auth::guard($guard)->check() &&
                Auth::user()->hasRole(RolesEnum::SUPERUSER)
            ) {
                return redirect()->route('dashboard.welcome');
            }
        }

        return $next($request);
    }
}
