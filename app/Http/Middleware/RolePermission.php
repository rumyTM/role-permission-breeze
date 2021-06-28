<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            Permission::with('roles')->get()->map(function ($permission) {
                Gate::define($permission->identifier, function ($user) use ($permission) {
                    foreach ($permission->roles as $role) {
                        if ($user->roles->contains($role)) {
                            return true;
                        }
                    }
                });
            });
        }

        return $next($request);
    }
}
