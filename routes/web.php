<?php
// Vista Principal
Route::get('/',function(){
	return view('welcome');
});

// Inicio de Sesion
Auth::routes();
Route::get('home', 'HomeController@index')->name('home');



//Inicio de Sesion OTP
Route::get('/key', 'SolicitarClaveController@index')->name('key.index');
Route::post('/key','SolicitarClaveController@create')->name('key.solicitar');

// Roles y Permisos
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
// Fin Roles y Permisos


// Inicio CRUD  Usuarios 
Route::resource('/users', 'UsersController');



