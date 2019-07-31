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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create/puntosDeAtencion','HomeController@createPuntosDeAtencion')->name('puntosDeAtencion');
Route::get('/create/oficinistas','HomeController@createOficinistas')->name('oficinistas');
Route::get('/ambos','HomeController@ambos')->name('ambos');

Route::get('/puntosAtencion', 'PuntosAtencionController@index');
Route::get('/puntosAtencion/show', 'PuntosAtencionController@index');
Route::get('/puntosAtencion/create', 'PuntosAtencionController@create');
Route::post('/puntosAtencion/store', 'PuntosAtencionController@store');
Route::get('/puntosAtencion/show/{id}', 'PuntosAtencionController@show');
Route::get('/puntosAtencion/edit/{id}', 'PuntosAtencionController@edit');
Route::post('/puntosAtencion/update/{id}', 'PuntosAtencionController@update');
Route::get('/puntosAtencion/destroy/{id}', 'PuntosAtencionController@destroy');

Route::get('/administradores', 'AdministradorController@index');
Route::get('/administradores/show/{id}', 'AdministradorController@show');
Route::get('/administradores/edit/{id}', 'AdministradorController@edit');
Route::get('/administradores/destroy/{id}', 'AdministradorController@destroy');


Route::get('/asuntos/create','AsuntosController@create');
Route::post('/asuntos/store','AsuntosController@store');
Route::get('/asuntos/destroy/{id}', 'AsuntosController@destroy');
Route::any('/asuntos/asignarAsuntos/show/{idPuesto}', 'AsuntosController@asignarAsuntos');
Route::any('/asuntos/asignarAsuntos/update', 'AsuntosController@asignarAsuntosUpdate');


Route::get('/oficinistas', 'OficinistasController@index');
Route::get('/oficinistas/show', 'OficinistasController@index');
Route::get('/oficinistas/create', 'OficinistasController@create');
Route::any('/oficinistas/store', 'OficinistasController@store');
Route::get('/oficinistas/show/{id}', 'OficinistasController@show');
Route::get('/oficinistas/edit/{id}', 'OficinistasController@edit');
Route::any('/oficinistas/update/{id}', 'OficinistasController@update');
Route::get('/oficinistas/destroy/{id}', 'OficinistasController@destroy');

Route::get('/puestos', 'PuestosController@index');
Route::get('/puestos/show', 'PuestosController@index');
Route::get('/puestos/create', 'PuestosController@create');
Route::any('/puestos/store', 'PuestosController@store');
Route::get('/puestos/show/{id}', 'PuestosController@show');
Route::get('/puestos/edit/{id}', 'PuestosController@edit');
Route::any('/puestos/update/{id}', 'PuestosController@update');
Route::get('/puestos/destroy/{id}', 'PuestosController@destroy');
Route::get('/puestos/AsignarPuestos/', 'PuestosController@asignarPuestos');
Route::any('/puestos/AsignarPuestos/update', 'PuestosController@asignarPuestosUpdate');
Route::any('/puestos/desAsignarPuestos', 'PuestosController@desAsignarPuestos');

Route::get('/clientes', 'ClienteController@index');
Route::get('/clientes2', 'ClienteController@index2');
/*Route::get('/clientes/createTable', 'clienteController@create');
Route::get('/clientes/createTable', 'clienteController@createTable');
Route::get('/clientes/createTableSchema', 'clienteController@createTableSchema');*/






	
