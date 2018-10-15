<?php

use Illuminate\Http\Request;

use App\Pr;
use App\Ulangan;
use App\Jadwal;
use App\Guru;

use App\Http\Resources\PrCollection;
use App\Http\Resources\UlanganCollection;
use App\Http\Resources\JadwalCollection;
use App\Http\Resources\GuruCollection;

//API Versi 1 GET

Route::group(['prefix'=> 'v1/'],function(){
	//GET PR
	Route::get('pr',function(){
		return new PrCollection(Pr::all());
	});
	//GET Ulangan
	Route::get('ulangan',function(){
		return new UlanganCollection(Ulangan::all());
	});
	//GET Jadwal Pelajaran
	Route::get('jadwal',function(){
		return new JadwalCollection(Jadwal::all());
	});
	//GET Guru
	Route::get('guru',function(){
		return new GuruCollection(Guru::all());
	});
});