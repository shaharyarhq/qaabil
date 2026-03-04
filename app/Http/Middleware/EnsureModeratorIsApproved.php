<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Filament\Moderator\Pages\PendingApproval;
use Closure;
use Illuminate\Http\Request;

class EnsureModeratorIsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = filament()->auth()->user();
        $routeName = $request->route()->getName();

        if (str_starts_with($routeName, 'filament.moderator.auth.')) {
            return $next($request);
        }

        if ($user && $user->hasRole(UserRole::MODERATOR) && $user->status !== UserStatus::APPROVED) {

            if ($request->routeIs(PendingApproval::getRouteName())) {
                return $next($request);
            }

            return redirect()->route(PendingApproval::getRouteName());
        }

        return $next($request);
    }
}
