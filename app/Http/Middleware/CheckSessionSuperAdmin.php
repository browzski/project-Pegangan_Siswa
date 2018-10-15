<?php

namespace App\Http\Middleware;

use Closure;

class CheckSessionSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $a = $request->session()->get('role');
        if($a != 'superadmin'){
            return back();
        }
        return $next($request);
    }
}
