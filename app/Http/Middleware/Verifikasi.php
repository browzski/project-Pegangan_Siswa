<?php

namespace App\Http\Middleware;

use Closure;

class Verifikasi
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
        $role = $request->session()->get('idrole');
        $url = $request->segment(2);
        if($role !== intval($url)){
            return back()->with('kembali','Njir lu ngapain tod');
        }
        return $next($request);
    }
}
