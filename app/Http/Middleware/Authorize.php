<?php

namespace App\Http\Middleware;

use App\Services\Roles\RolesGenerator;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Authorize
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
        $permissions[] = RolesGenerator::GetPermissionFromRoute();

        foreach (RolesGenerator::CONTROLLERS_WITH_MULTI_MODULES as $BASE_MODULE => $MODULES) {
            if (Str::contains($permissions[0], $BASE_MODULE)) {
                foreach ($MODULES as $MODULE)
                    $permissions[] = Str::replace($BASE_MODULE, $MODULE, $permissions[0]);
            }
        }

        if (Auth::check() && !Auth::user()->canAny($permissions))
            abort(401);

        return $next($request);
    }
}
