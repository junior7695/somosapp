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
// Fin Roles y Permisos


// Inicio CRUD  Usuarios 
	//Roles Usuarios

	Route::post('users/store', 'UserController@store')->name('users.store')
		->middleware('permission:users.create');

	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::get('users/create', 'UserController@create')->name('users.create')
		->middleware('permission:users.create');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{user}/show', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');

	Route::get('reports','ReportesController@index')->name('reports.index')->middleware('permission:reports.index');

	// Usuarios Conectados
	Route::get('sessions', 'SessionController@index')->name('sessions.index')->middleware('permission:sessions.index');

	Route::delete('sessions/{session}', 'SessionController@endsession')->name('sessions.endsession')->middleware('permission:sessions.endsession');


});


	// ** Perfil * 

	Route::get('perfil/{user}/edit', 'UserController@perfil')->name('users.perfil');
	Route::put('perfil/{user}', 'UserController@updatePerfil')->name('users.updatePerfil');	
