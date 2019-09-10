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
use \App\Asunto;

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

	public function viewAsuntos(Request $request){
		$asuntos = Asunto::where('punto_de_atencion_id',$request->puntoAtencionId)->get();

		if($asuntos->count()==0){
			$response['status']=false;
			$response['msg']="No hay asuntos para atender";
		}else{
			$response['status']=true;
			$response['asuntos']=$asuntos;
		}

		echo json_encode($response);

	}
	public function takeTurno(Request $request){
		echo "hello wolrd takeTurno";
	}
	public function autenticarOficinista(Request $request){
		echo "hello wolrd autenticarOficinista";
	}
	public function getTurnosByPuesto(Request $request,$idPuesto){
		echo "hello wolrd getTurnosByPuesto "."<br>";
		echo "idPuesto: ".$idPuesto;
	}
	public function getTurnosInOperation(Request $request){
		echo "hello wolrd getTurnosInOperation";
	}
	public function atenderTurno(Request $request,$idTurno){
		echo "hello wolrd atenderTurno"."<br>";
		echo $idTurno;
	}
	public function noAtenderTurno(Request $request,$idTurno){
		echo "hello wolrd no atenderTurno"."<br>";
		echo $idTurno;
	}
	public function back(Request $request,$idTurno){
		echo "hello wolrd back"."<br>";
		echo $idTurno;
	}
}







