<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
class GuruController extends Controller
{
	protected $g = array();

	function __construct(){
		$this->g['user'] = \App\Auth::find(\Session::get('idrole'));
		$this->g['guru'] = 'active';
	}
    function index(){
    	$this->g['title'] = 'Data Guru';
    	return view('admin.guru.index',$this->g);
    }
    function create(){
    	$this->g['title'] = 'Buat Data Guru';
    	return view('admin.guru.create',$this->g);
    }
    function store(Request $req){
    	\App\Guru::create($req->all());
    	return redirect('/superadmin/guru');
    }
    function edit($id){
        $this->g['data'] = Guru::find($id);
        $this->g['title'] = 'Edit Data Guru';
        return view('admin.guru.edit',$this->g);
    }
    function update(Request $req , $id){
        $a = ['nama','foto','telepon'];
        $w = Guru::find($id);
        foreach($a as $arr){
            $w[$arr] = $req[$arr];
        }
        $w->save();
        return redirect('/superadmin/guru');
    }
    function destroy($id){
        $a = Guru::find($id);
        $a->delete();
        return redirect('/superadmin/guru');
    }
}
