<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //Updates: Users with higher roles inherit permissions of lower roles 
    public function handle(Request $request, Closure $next, ...$roles): Response 
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        //Exemple: Admin can access routes restricted to editor
        $user = Auth::user();
        $userRoleLevel = User::ROLE_HIERARCHY[$user->role] ?? 0;

        foreach ($roles as $role) {
            $requiredRoleLevel = User::ROLE_HIERARCHY[$role] ?? 0;
            if ($userRoleLevel >= $requiredRoleLevel) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized');
    }
}