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
			/*$response['query']=*/
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

		$asunto =Asunto::where('punto_de_atencion_id',$request->puntoAtencionId)->where('id',$request->asunto)->get();

		$puestos = Puesto::where('punto_de_atencion_id',$request->puntoAtencionId)->get();

		$oficinistas = Oficinista::where('punto_de_atencion_id',$request->puntoAtencionId)->get();

		$asuntosPuestoAsignado =Asunto::find($request->asunto)->puestos;

	/*	$oficinistasAsignados =Asunto::find($request->asunto)->puestos->getIdOficinista();*/
		$oficinistasAsignados =DB::table('asuntos')
								->select('asuntos.nombre_asunto','puestos.numero as numero_puesto','oficinistas.nombre as oficinista_nombre')
								->join('asunto_puesto','asunto_puesto.asunto_id','asuntos.id')
								->join('puestos','puestos.id','asunto_puesto.puesto_id')
								->join('oficinistas','oficinistas.id','puestos.oficinista_id')
							 	->where('asuntos.id','=',$request->asunto)->get();

		/*SELECT a.*,ap.*,p.*, o.nombre
		FROM asuntos a
		INNER JOIN asunto_puesto ap ON ap.asunto_id =a.id
		INNER JOIN puestos p ON p.id=ap.puesto_id
		INNER JOIN oficinistas o ON o.id =p.oficinista_id
		WHERE a.id =88;*/


		/*  $puestos = DB::table('puestos')
		                    ->leftjoin('oficinistas', 'puestos.oficinista_id', '=', 'oficinistas.id')
		                    ->select('puestos.*', 'oficinistas.nombre as oficinista')
		                    ->where('puestos.punto_de_atencion_id',$pId)
		                    ->where('descripcion','LIKE',"%$descripcion%")
		                    ->where(function ($query) use($oficinista)
		                    {
		                        if(empty($oficinista)){
		                             $query->where('oficinistas.nombre','LIKE',"%$oficinista%")
		                            ->orWhereNull('oficinistas.nombre');
		                        }else{
		                            $query->where('oficinistas.nombre','LIKE',"%$oficinista%");
		                        }
		                       
		                    })
		                    ->orderBy('id', 'ASC')
		                    ->paginate(5);
		
		        $numPuestos = $puestos->count();*/

		

		// echo json_encode($puestos);

		// echo json_encode($asunto);


		// echo json_encode($puntoAtencion);

		if($puntoAtencion->count()==0){
			$response['status'] =false;
			$response['msg']="Punto de atención no  encontrado";
			$response['parametros'] =$parametros;
		}else if($asunto->count()==0){
			$response['status'] =false;
			$response['msg']="Asunto no existente";
			$response['parametros'] =$parametros;
		}else if($puestos->count()==0){
			$response['status'] =false;
			$response['msg']="No hay puestos creados";
			$response['parametros'] =$parametros;
		}else if($oficinistas->count()==0){
			$response['status'] =false;
			$response['msg']="No hay oficinistas creados";
			$response['parametros'] =$parametros;
		}else if($asuntosPuestoAsignado->count()==0){
			$response['status'] =false;
			$response['msg']="Asunto no tiene un puesto asignado";
			$response['parametros'] =$parametros;
		}else if($oficinistasAsignados->count()==0){
			$response['status'] =false;
			$response['msg']="Asunto no tiene un oficinista asignadoo";
			$response['parametros'] =$parametros;
		}
		else{
			$response['algo']="algo";
			$response['parametros'] =$parametros;

			$asuntosPuestoAsignado =Asunto::find($request->asunto)->puestos;
			$response['puestosAsignados']=$asuntosPuestoAsignado;

			$response['oficinistasAsingnados']=$oficinistasAsignados;
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







