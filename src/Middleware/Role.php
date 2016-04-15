<?php

namespace Nimfus\RolesManager\Middleware;

use Closure;

class Role
{
    /**
     * @param $request
     * @param Closure $next
     * @param $role
     * @param string $redirect_path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next, $role, $redirect_path = 'login')
    {
        if(auth()->check() && auth()->user()->hasRole($role)) {
            return $next($request);
        }

        return redirect($redirect_path);
    }
}