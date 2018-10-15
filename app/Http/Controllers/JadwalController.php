<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
class JadwalController extends Controller
{
    protected $w = array();
    function __construct(){
    	$this->w['user'] = \App\Auth::find(\Session::get('idrole'));
    	$this->w['jadwal'] = 'active';
    }
    function index(){
    	$this->w['title'] = 'Jadwal Pelajaran';
    	return view('admin.jadwal.index',$this->w);
    }
    function create(){
    	$this->w['title'] = 'Create Jadwal Pelajaran';
    	$this->w['a'] = ['Senin','Selasa','Rabu','Kamis','Jumat'];
    	return view('admin.jadwal.create',$this->w);
    }
    function store(Request $req){
    	Jadwal::create($req->all());
    	return redirect('/superadmin/jadwal');
    }
    function edit($id){
    	$this->w['a'] = ['Senin','Selasa','Rabu','Kamis','Jumat'];
    	$this->w['u'] = Jadwal::find($id);
    	$this->w['title'] = 'Edit Jadwal Pelajaran';
    	return view('admin.jadwal.edit',$this->w);
    }
    function destroy($id){
    	$a = Jadwal::find($id);
    	$a->delete();
    	return redirect('/superadmin/jadwal');
    }
}
