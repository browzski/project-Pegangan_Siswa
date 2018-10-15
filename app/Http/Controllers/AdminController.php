<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Murid;
class AdminController extends Controller
{
    public function dashboard(Request $req){
    	$data['user'] = Auth::find(\Session::get('idrole'));
    	$data['title'] = 'Dashboard';
    	$data['dashboard'] = 'active';
    	return view('admin.static.dashboard',$data);
    }
    public function verify_show($id){
    	$data['user'] = Auth::find(\Session::get('idrole'));
    	$data['title'] = 'Verifikasi Akun';
    	return view('admin.static.verifikasi',$data);
    	
    }
    public function verify_post(Request $req , $id){
        $req->validate(['tanggal_lahir'=>'required']);
        $a = \App\Auth::find($req->post('user_id'));
        $a->verified = 1;
        $a->save();
        Murid::create($req->all());
        return redirect('/');
    }
    public function guru(){
        $data['dashboard'] = 'active';
        $data['user'] = \App\Auth::find(\Session::get('idrole'));
        $data['title'] = 'Data Guru';
        $data['suck'] = 'yesiam';
        return view('admin.guru.index',$data);
    }
    public function jadwal(){
        $data['dashboard'] = 'active';
        $data['user'] = \App\Auth::find(\Session::get('idrole'));
        $data['title'] = 'Data Jadwal';
        $data['suck'] = 'yesiam';
        return view('admin.jadwal.index',$data);
    }
    public function siswa(){
        $data['dashboard'] = 'active';
        $data['user'] = \App\Auth::find(\Session::get('idrole'));
        $data['title'] = 'Data Siswa';
        $data['suck'] = 'yesiam';
        return view('admin.static.siswa',$data);
    }
}
