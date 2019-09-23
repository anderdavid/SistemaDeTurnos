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
use \App\Puesto;
use \App\Oficinista;

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

		$puntoDeAtencion =PuntoDeAtencion::where('id',$request->puntoAtencionId)->get();

		if($puntoDeAtencion->count()==0){
			$response['status'] =false;
			$response['msg']="Punto de atención no  encontrado";
		}
		else{
			$asuntos = Asunto::where('punto_de_atencion_id',$request->puntoAtencionId)->get();

			if($asuntos->count()==0){
				$response['status']=false;
				$response['msg']="No hay asuntos para atender";
			}else{
				$response['status']=true;
				$response['asuntos']=$asuntos;
			}
		}

		echo json_encode($response);
		
	}

	public function takeTurno(Request $request){

		$parametros["puntoAtencionId"]=$request->puntoAtencionId;
		$parametros["cedula_cliente"]=$request->cedula_cliente;
		$parametros["asunto"]=$request->asunto;
		$parametros["nombre_cliente"]=$request->nombre_cliente;

		// echo json_encode($parametros);

		$puntoAtencion = PuntoDeAtencion::where('id',$request->puntoAtencionId)->get();

		$asunto =Asunto::where('punto_de_atencion_id',$request->puntoAtencionId)->where('nombre_asunto',$request->asunto)->get();

		$puestos = Puesto::where('punto_de_atencion_id',$request->puntoAtencionId)->get();

		$oficinistas = Oficinista::where('punto_de_atencion_id',$request->puntoAtencionId)->get();

		// echo json_encode($puestos);

		// echo json_encode($asunto);


		// echo json_encode($puntoAtencion);

		if($puntoAtencion->count()==0){
			$response['status'] =false;
			$response['msg']="Punto de atención no  encontrado";
		}else if($asunto->count()==0){
			$response['status'] =false;
			$response['msg']="Asunto no existente";
		}else if($puestos->count()==0){
			$response['status'] =false;
			$response['msg']="No hay puestos creados";
		}else if($oficinistas->count()==0){
			$response['status'] =false;
			$response['msg']="No hay oficinistas creados";
		}
		else{
			$response['algo']="algo";
		}

		echo json_encode($response);




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







