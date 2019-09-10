<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use \App\PuntoDeAtencion;
use \App\User;
use \App\Role;

class ApiRestController extends Controller
{
	public function autenticacion(Request $request){
	
		$user =User::where('email',$request->email)->first();

		if($user==null){
			$response['status']=false;
			$response['msg']="Error de autenticación";
		}else{
			$hash =Hash::check($request->password,$user->password, []);

			if($hash!="1"){

				$response['status']=false;
				$response['msg']="Error de autenticación";
			}else{
				$puntoAtencion = User::find($user->id)->puntoDeAtencion;
				$puntoDeAtencionId=$puntoAtencion->id;

				$response['status']=true;
				$response['PuntoDeAtencionId']=$puntoDeAtencionId;
				
			}
		}

		echo json_encode($response);
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







