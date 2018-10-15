<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pr;
class PrController extends Controller
{
	protected $dataPR = array();
	function __construct(){
		$this->dataPR['user'] = \App\Auth::find(\Session::get('idrole'));
		$this->dataPR['pr'] = 'active';
	}
    function index(){
    	$this->dataPR['title'] = 'Data PR';
    	return view('admin.pr.index',$this->dataPR);
    }
    function create(){
    	$this->dataPR['title'] = 'Create PR';
    	return view('admin.pr.create',$this->dataPR);
    }
    function store(Request $req){
    	$req->validate(['judul'=>'required','isi'=>'required']);
        Pr::create($req->all());
        return redirect('/admin/pr');
    }
    function edit($id){
        $this->dataPR['users'] = Pr::find($id);
        $this->dataPR['title'] = 'Edit PR';
        return view('admin.pr.edit',$this->dataPR);
    }
    function update(Request $req , $id){
        $arr = ['judul','isi','untuk_tanggal','editor_id'];
        $a = Pr::findOrFail($id);
        foreach($arr as $as){
            $a[$as] = $req[$as];
        }
        $a->save();
        return redirect('/admin/pr');
    }
    function destroy($id){
        $a = Pr::findOrFail($id);
        $a->delete();
        return redirect('/admin/pr');
    }
}
