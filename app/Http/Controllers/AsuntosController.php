<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Asunto;

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
           /* echo $msg;
            echo json_encode($valAsunto);*/
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
}
