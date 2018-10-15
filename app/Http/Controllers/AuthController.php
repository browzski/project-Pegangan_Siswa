<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
class AuthController extends Controller
{
    function login(){
    	$data['title'] = 'Login';
    	return view('auth.login',$data);
    }
    function storeLogin(Request $params){
        if($params->username == '0 OR 1=1'){
            return redirect('login?sql=injection');
        }
    	if($a = Auth::where('username',$params->username)->orWhere('email',$params->username)->first()){
        	if(\Hash::check($params->password,$a->password)){
        		$r = str_random(16);
        		$a->cookie = $r;
        		$a->token = str_random(8);
        		$cookie = cookie('KueNikmat',base64_encode($r),2160);
        		$a->save();
                $params->session()->put('kelas',$a->kelas);
                $params->session()->put('role',$a->role);
                $params->session()->put('idrole',$a->id);
        		return redirect('/')->cookie($cookie);
        	}
        	else{
        		return redirect('login?err=1');
        	}
        }
        else{
            return redirect('login?err=1');
        }
    }
    function register(){
    	$data['title'] = 'Register';
    	return view('auth.register',$data);
    }
    function storeRegister(Request $params){
    	$arr = ['nama_lengkap','username','email'];
    	$a = new Auth;
    	foreach($arr as $ar){
    		$a[$ar] = $params[$ar];
    	}
    	$a->password = bcrypt($params->password);
    	$a->role = 'admin';
    	$a->save();
    	return redirect('login');
    }
    function destroy(Request $r){
        $r->session()->flush();
        $c = \Cookie::forget('KueNikmat');
        return redirect('login')->withCookie($c);

    }
}
