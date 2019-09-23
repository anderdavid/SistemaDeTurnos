<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

#API REST TURNERA
Route::any('autenticacion','ApiRestController@autenticacion');
Route::any('asuntos','ApiRestController@viewAsuntos');
Route::any('getTurno','ApiRestController@takeTurno');
Route::any('oficinista/autenticacion','ApiRestController@autenticarOficinista');
Route::any('turnos/puesto/{ipPuesto}','ApiRestController@getTurnosByPuesto');
Route::any('turnos/operacion','ApiRestController@getTurnosInOperation');
Route::any('turnos/atender/{idTurno}','ApiRestController@atenderTurno');
Route::any('turnos/noAtender/{idTurno}','ApiRestController@noAtenderTurno');
Route::any('turnos/back/{idTurno}','ApiRestController@back');


