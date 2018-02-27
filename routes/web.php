<?php

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', function(){
	return ('Usuarios');
});
Route::get('/usuarios/{id}', function($id){
	return "Mostrano detalle del usuario: {$id}";
});

Route::get('/login', 'LoginController@login')->name('login.login');
Route::post('/login', 'LoginController@store')->name('login.store');
/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

Route::resource('/crear','CrearUsuariosController');

// Rutas del proyecto ROLES y PERMISOS

Route::get('/',function(){
	return view('welcome');
});

Auth::routes();

Route::post('otp','OTPController@enviar');

		
Route::get('home', 'HomeController@index')->name('home');//->middleware('permission:home');

Route::middleware(['auth'])->group(function(){

	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');






});