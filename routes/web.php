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


Route::get('/clientes', 'ClienteController@index');
Route::get('/clientes2', 'ClienteController@index2');
/*Route::get('/clientes/createTable', 'clienteController@create');
Route::get('/clientes/createTable', 'clienteController@createTable');
Route::get('/clientes/createTableSchema', 'clienteController@createTableSchema');*/






	
