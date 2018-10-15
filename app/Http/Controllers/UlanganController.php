<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ulangan;
class UlanganController extends Controller
{
	protected $dataUlangan = array();
	function __construct(){
		$this->dataUlangan['user'] = \App\Auth::find(\Session::get('idrole'));
		$this->dataUlangan['ulangan'] = 'active';
	}
    function index(){
    	$this->dataUlangan['title'] = 'Data Ulangan';
    	return view('admin.ulangan.index',$this->dataUlangan);
    }
    function create(){
    	$this->dataUlangan['title'] = 'Create Ulangan';
    	return view('admin.ulangan.create',$this->dataUlangan);
    }
    function store(Request $req){
    	$req->validate(['judul'=>'required','isi'=>'required']);
        Ulangan::create($req->all());
        return redirect('/admin/ulangan');
    }
    function edit($id){
        $this->dataUlangan['users'] = Ulangan::find($id);
        $this->dataUlangan['title'] = 'Edit Ulangan';
        return view('admin.ulangan.edit',$this->dataUlangan);
    }
    function update(Request $req , $id){
        $arr = ['judul','isi','untuk_tanggal','editor_id'];
        $a = Ulangan::findOrFail($id);
        foreach($arr as $as){
            $a[$as] = $req[$as];
        }
        $a->save();
        return redirect('/admin/ulangan');
    }
    function destroy($id){
        $a = Ulangan::findOrFail($id);
        $a->delete();
        return redirect('/admin/ulangan');
    }
}
