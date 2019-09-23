<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use \App\Asunto;
use \App\Puesto;

class AsuntosController extends Controller
{   
    

     public function __construct(Request $request)
     {
        $this->middleware('auth');
       
      
     }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $asuntos =\App\Asunto::where('punto_de_atencion_id', $pId)->orderBy('id','DESC')->get();
        $numAsuntos=$asuntos->count();
       
        return view('/asuntos/createAsuntos', ['numAsuntos' =>$numAsuntos,'asuntos'=>$asuntos]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

     
        $valAsunto = \App\Asunto::where('nombre_asunto',$request->asunto)->where('punto_de_atencion_id', $pId)->first();

        if(isset($valAsunto)&&$valAsunto!=null){
            $msg="Asunto ya existe";
          
            return redirect('/asuntos/create'); 
        }else{
            $asunto = new Asunto();
            $asunto->nombre_asunto=$request->asunto;
            $asunto->punto_de_atencion_id= $pId;
            $asunto->save();

           return redirect('/asuntos/create'); 
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $deleteAsunto = \App\Asunto::where('id',$id)->where('punto_de_atencion_id', $pId)->delete();

        return redirect('/asuntos/create'); 
    }

    public function asignarAsuntos(Request $request,$idPuesto){

        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $puestos = DB::table('puestos')
                    ->where('puestos.punto_de_atencion_id',"=", $pId)
                    ->leftjoin('oficinistas', 'puestos.oficinista_id', '=', 'oficinistas.id')
                    ->select('puestos.*', 'oficinistas.id as oficinistaId','oficinistas.nombre as oficinista','oficinistas.genero as oficinistaGenero')
                    ->orderBy('numero', 'ASC')
                    ->get();

        $numPuestos =$puestos->count();

        $asuntos =\App\Asunto::where('punto_de_atencion_id', $pId)->orderBy('id','DESC')->get();
        $numAsuntos=$asuntos->count();

        if($numPuestos==0){
            return view('/asuntos/asignarAsuntos',['data'=>false]);
           
        }else{
         
            $puestoSeleccionado= DB::table('puestos')
                    ->leftjoin('oficinistas', 'puestos.oficinista_id', '=', 'oficinistas.id')
                    ->select('puestos.*', 'oficinistas.id as oficinistaId','oficinistas.nombre as oficinista','oficinistas.genero as oficinistaGenero')
                    ->where('puestos.id','=',$idPuesto)
                    ->orderBy('numero', 'ASC')
                    ->first();
             $puestoAsuntos = \App\Puesto::find($idPuesto);


    

            if($puestoSeleccionado==null){
                $puestoSeleccionadoTemp=Puesto::where('punto_de_atencion_id', $pId)->first();
                $puestoSeleccionado= DB::table('puestos')
                        ->leftjoin('oficinistas', 'puestos.oficinista_id', '=', 'oficinistas.id')
                        ->select('puestos.*', 'oficinistas.id as oficinistaId','oficinistas.nombre as oficinista','oficinistas.genero as oficinistaGenero')
                        ->where('puestos.id','=',$puestoSeleccionadoTemp->id)
                        ->orderBy('numero', 'ASC')
                        ->first();
                $puestoAsuntos = \App\Puesto::find($puestoSeleccionadoTemp->id);
               
            }
             $numAsuntosAsignados = $puestoAsuntos->asuntos->count();

            

            return view('/asuntos/asignarAsuntos',[
                        'puestos'=>$puestos,
                        'puestoSeleccionadoId'=>$idPuesto,
                        'puestoSeleccionado'=>$puestoSeleccionado,
                        'asuntos'=> $asuntos,
                        'puestoAsuntos'=>$puestoAsuntos,
                        'numAsuntos'=>$numAsuntos,
                        'numAsuntosAsignados'=>$numAsuntosAsignados,
                        'data'=>true
                        ]); 
        }

    }

    public function asignarAsuntosUpdate(Request $request){

        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $asuntoId =$request->asuntoId;
        $puestoId=$request->puestoId;

        $asunto =\App\Asunto::find($asuntoId);
        $puesto =\App\Puesto::find($puestoId);
        $valAsunto="algo";

        $valAsunto =DB::table('asunto_puesto')
                    ->select('asunto_puesto.*')
                    ->where('asunto_id','=',$asuntoId)
                    ->where('puesto_id','=',$puestoId)
                    ->first();

        if(isset($valAsunto)&&$valAsunto!=null){
            $msg="Asunto ya existe";
           
        }else{
           
            $asunto->puestos()->attach($puesto);
        }

        $reponse=json_encode($valAsunto);

        return new Response("asignarAsuntosUpdate ".$reponse);
    
    }

    public function asignarAsuntosDelete(Request $request){

        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $asunto =\App\Asunto::find($request->asuntoId);
        $asunto->puestos()->detach($request->puestoId);

     return new Response("asignarAsuntosDelete");

    }
}


