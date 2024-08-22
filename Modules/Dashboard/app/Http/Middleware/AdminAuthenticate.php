<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Dashboard\Enums\RolesEnum;
use Symfony\Component\HttpFoundation\Response;

final class AdminAuthenticate implements AuthenticatesRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( ! Auth::check() || ! Auth::user()->hasRole(RolesEnum::SUPERUSER)) {
            throw new AuthenticationException(
                message: 'Unauthenticated.',
                redirectTo: $this->redirectTo($request)
            );
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    private function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('dashboard.login');
    }
}
