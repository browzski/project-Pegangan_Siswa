<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        $role = $request->session()->get('role');
        if($role == 'admin'){
            $url = $request->segment(4);
            $edit = $request->segment(2);
            if($edit == 'pr'){
                $e = \App\Pr::find($url);
            }
            if($edit == 'ulangan'){
                $e = \App\Ulangan::find($url);
            }
            if($edit == 'guru'){
                $e = \App\Guru::find($url);
            }
            $id = $request->session()->get('idrole');
            if($id !== $e->creator_id){
                return redirect('/admin/'.$edit)->with('kembali','Hayoo mau ngapain.. wkwk');
            }
            
        }
        return $next($request);
    }
}
