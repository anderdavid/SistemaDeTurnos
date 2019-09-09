<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiRestController extends Controller
{
	public function autenticacion(){
		echo "hello wolrd autenticacion";
	}
	public function viewAsuntos(){
		echo "hello wolrd viewAsuntos";
	}
	public function takeTurno(){
		echo "hello wolrd takeTurno";
	}
	public function autenticarOficinista(){
		echo "hello wolrd autenticarOficinista";
	}
	public function getTurnosByPuesto($idPuesto){
		echo "hello wolrd getTurnosByPuesto "."<br>";
		echo "idPuesto: ".$idPuesto;
	}
	public function getTurnosInOperation(){
		echo "hello wolrd getTurnosInOperation";
	}
	public function atenderTurno($idTurno){
		echo "hello wolrd atenderTurno"."<br>";
		echo $idTurno;

	}
	public function noAtenderTurno($idTurno){
		echo "hello wolrd no atenderTurno"."<br>";
		echo $idTurno;
	}
	public function back($idTurno){
		echo "hello wolrd back"."<br>";
		echo $idTurno;
	}
}


/*192.168.1.142/api/autenticacion
192.168.1.142:8000/api/asuntos
192.168.1.142:8000/api/turnos
192.168.1.142:8000/api/oficinista/autenticacion
192.168.1.142:8000/api/turnos/puesto/1
192.168.1.142:8000/api/turnos/operacion
192.168.1.142:8000/api/turnos/atender
192.168.1.142:8000/api/turnos/noAtender
192.168.1.142:8000/api/turnos/back*/



