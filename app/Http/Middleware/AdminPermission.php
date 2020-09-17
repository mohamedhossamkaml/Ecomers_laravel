<?php

namespace App\Http\Middleware;

use Closure;

class AdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (admin()->user()->group_id === null ||admin()->user()->group->$role == 'disable') 
        {
            session()->flash('error', atrans(''));

            return back();
        }
        return $next($request);
    }
}
