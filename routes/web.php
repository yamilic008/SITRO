<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/buscar','TareaController@busca')->name('buscar');
Route::put('/buscart','TareaController@buscat')->name('buscart');

Route::group(['middleware' => ['auth']], function () {
	Route::resource('usuario', 'super\UsuarioController');
	Route::get('/profile', 'super\UsuarioController@profile')->name('user.profile');
	Route::patch('/profile', 'super\UsuarioController@update_profile')->name('user.profile.update');
	Route::put('/profile/{id}', 'super\UsuarioController@pass')->name('user.profile.pass');
	Route::put('/profiles/{id}', 'super\UsuarioController@name')->name('user.profile.name');

	Route::resource('roles', 'super\RolesController');
	Route::resource('permisos', 'super\PermisosController');

	Route::resource('empresa', 'super\EmpresaController');
	Route::put('empresauser/{id}', 'super\EmpresaController@user')->name('empresa.user');
	Route::patch('/empresa', 'super\EmpresaController@update_empresa')->name('empresa.update.image');
	Route::resource('pagos', 'super\PagoController');

	Route::resource('clientes', 'admin\ClienteController');
	Route::resource('articulo', 'ArticuloController');
	Route::resource('tareas', 'TareaController');

	Route::get('tareaspago/{id}', 'TareaController@verpago')->name('tareas.verpago');
	Route::put('tareaspago1/{id}', 'TareaController@pago')->name('tareas.pago');

	Route::get('articulo/create/{id}', 'ArticuloController@create')->name('articulando');
	Route::put('/actualizar/{id}','ArticuloController@actualizar')->name('actualizar');
	Route::put('/actualizartarea/{id}','TareaController@actualizar')->name('actualizartarea');

	Route::get('/ticket/{id}','pdf\PdfController@ticket')->name('ticket');

});