<?php

namespace DIYRolePermission\Shared\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$role)
    {
         $user = $request->user();

        if (!$user || !$user->hasAnyRole($role)) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
