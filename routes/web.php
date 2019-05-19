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
Route::get('/usuarios','HomeController@createUsers')->name('users');
Route::get('/oficinas','HomeController@createOficinas')->name('oficinas');
Route::get('/ambos','HomeController@ambos')->name('ambos');
