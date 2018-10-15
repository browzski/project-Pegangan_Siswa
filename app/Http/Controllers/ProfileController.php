<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Murid;
class ProfileController extends Controller
{
    public function show(Request $req){
    	$data['title'] = 'Edit Profile';
    	$data['user'] = \App\Auth::find(\Session::get('idrole'));
    	$data['id'] = $req->id;
    	$data['dashboard'] = 'active';
    	return view('admin.static.profile',$data);
    }
    public function edit(Request $req){
    	$murid = Murid::where('user_id',$req->user_id)->first(); 
    	$auth = Auth::find($req->user_id);
    	$arrM = ['nama_lengkap','tanggal_lahir','email','profile','absen'];
    	$arrA = ['nama_lengkap','email'];
    	foreach($arrM as $arr){
    		$murid[$arr] = $req[$arr];
    	}
    	$murid->save();
    	foreach($arrA as $arr){
    		$auth[$arr] = $req[$arr];
    	}
    	$auth->save();
    	return redirect('/admin/dashboard');
    }
}
