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



Route::get('/oficinas', 'OficinasController@index');
Route::get('/oficinas/show', 'OficinasController@index');

Route::get('/oficinas/create', 'OficinasController@create');
Route::get('/oficinas/store', 'OficinasController@store');

Route::get('/oficinas/show/{id}', 'OficinasController@show');
Route::get('/oficinas/edit/{id}', 'OficinasController@edit');
Route::get('/oficinas/update/{id}', 'OficinasController@update');

Route::get('/oficinas/destroy/{id}', 'OficinasController@destroy');





	
