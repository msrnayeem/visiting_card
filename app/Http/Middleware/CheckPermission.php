<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        $user = Auth::user();

        if (!$user) {
            return response(['message' => 'Login First'], 401);
        }

        foreach ($permissions as $permission) {
            if (!$user->hasPermissionTo($permission)) {
                return response(['message' => 'You are not authorized'], 403);
            }
        }

        return $next($request);
    }
}
