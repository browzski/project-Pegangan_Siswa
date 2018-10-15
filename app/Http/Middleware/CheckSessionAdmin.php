<?php

namespace App\Http\Middleware;

use Closure;

class CheckSessionAdmin
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
        if(!$ses = $request->session()->get('role')){
            return redirect('login');
        }
        if($ses == 'users'){
            return back();
        }
        return $next($request);
    }
}
