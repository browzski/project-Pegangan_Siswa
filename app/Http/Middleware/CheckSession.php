<?php

namespace App\Http\Middleware;

use Closure;

class CheckSession
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
        $ses = $request->session()->get('role');
        if($ses == 'admin' || $ses == 'superadmin' || $ses == 'king'){
            return redirect('admin/dashboard');
        }
        if($ses == 'users'){
            return redirect('dashboard');
        }
        else{
            return redirect('login');
        }
        return $next($request);
    }
}
