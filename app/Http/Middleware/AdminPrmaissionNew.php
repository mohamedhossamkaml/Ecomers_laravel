<?php

namespace App\Http\Middleware;

use Closure;

class AdminPrmaissionNew
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next=null, $role=null)
    {
        // if(admin()->user()->group->$role == 'disable'){
        //     session()->flash('error', atrans('disable'));
        //     return back();
        // }
        // return $next($request);
    }
}
