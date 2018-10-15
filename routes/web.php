<?php

//Gate

Route::get('/')->middleware('global','gate');

//Auth

Route::get('/login','AuthController@login')->middleware('global');
Route::get('/register','AuthController@register');
Route::post('/login','AuthController@storeLogin');
Route::post('/register','AuthController@storeRegister');
Route::get('/logout','AuthController@destroy');

//Users

Route::group(['middleware'=>'users'],function(){

	Route::group(['middleware'=>'verifikasi'],function(){
		Route::get('/verifikasi/{id}','AdminController@verify_show');
		Route::post('/verifikasi/{id}','AdminController@verify_post');
	});
	


});

//Admin

Route::group(['prefix'=>'admin/','middleware' =>'admin'],function(){

	//Redirect To Dasboard

	Route::get('/',function(){
		return redirect('/admin/dashboard');
	});

	//Dashboard

	Route::get('dashboard','AdminController@dashboard');
	Route::get('guru','AdminController@guru');
	Route::get('jadwal','AdminController@jadwal');
	Route::get('siswa','AdminController@siswa');

	//Profile

	Route::post('edit','ProfileController@show');
	Route::post('profile','ProfileController@edit');

	//Membutuhkan Verify

	Route::group(['middleware'=>'checkRole'],function(){
		Route::get('pr/edit/{id}','PrController@edit');
		Route::post('pr/edit/{id}','PrController@update');
		Route::get('pr/delete/{id}','PrController@destroy');
		Route::get('ulangan/edit/{id}','UlanganController@edit');
		Route::post('ulangan/edit/{id}','UlanganController@update');
		Route::get('ulangan/delete/{id}','UlanganController@destroy');
	});

	//PR CRUD

	Route::get('pr','PrController@index');
	Route::get('pr/create','PrController@create');
	Route::post('pr','PrController@store');


	//Ulangan CRUD

	Route::get('ulangan','UlanganController@index');
	Route::get('ulangan/create','UlanganController@create');
	Route::post('ulangan','UlanganController@store');


	

});

//Superadmin

Route::group(['prefix'=>'superadmin/','middleware' =>'superadmin'],function(){

	//Guru CRUD

	Route::get('guru','GuruController@index');
	Route::get('guru/create','GuruController@create');
	Route::post('guru','GuruController@store');
	Route::get('guru/edit/{id}','GuruController@edit');
	Route::post('guru/edit/{id}','GuruController@update');
	Route::get('guru/delete/{id}','GuruController@destroy');

	//Jadwal CRUD

	Route::get('jadwal','JadwalController@index');
	Route::get('jadwal/create','JadwalController@create');
	Route::post('jadwal','JadwalController@store');
	Route::get('jadwal/edit/{id}','JadwalController@edit');
	Route::post('jadwal/edit/{id}','JadwalController@update');
	Route::get('jadwal/delete/{id}','JadwalController@destroy');
	
});