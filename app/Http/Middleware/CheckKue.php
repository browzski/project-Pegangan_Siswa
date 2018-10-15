<?php

namespace App\Http\Middleware;

use Closure;
use App\Auth;
class CheckKue{
    public function handle($request, Closure $next){
        if($r = $request->cookie('KueNikmat')){

            $w = $request->session()->has('role');
            $i = $request->session()->has('idrole');
            $k = $request->session()->has('kelas');

            $c = Auth::where('cookie',base64_decode($r))->first();
            if($c){
                if(!$w || !$i || !$k){
                    $request->session()->put('role',$c->role);
                    $request->session()->put('idrole',$c->id);
                    $request->session()->put('kelas',$c->kelas);
                }    
            }
            
        }
        return $next($request);
    }
}
