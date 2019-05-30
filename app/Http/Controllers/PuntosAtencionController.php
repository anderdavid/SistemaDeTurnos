<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use \App\PuntoDeAtencion;
use \App\User;

class PuntosAtencionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puntosAtencion = \App\PuntoDeAtencion::all();

        return view('puntosAtencion/view', ['puntosAtencion' =>$puntosAtencion]);

        //return view('puntosAtencion/view');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('puntosAtencion/create');
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mUsuario = new User;
        $mPuntoAtencion = new PuntoDeAtencion;

        $valUsuario =User::where('email',$request->email)->first();
        $valPuntoAtencion =PuntoDeAtencion::where('nombre',$request->nombrePuntoAtencion)->first();

        if(isset($valUsuario)){
            $msg="Email ya existe";
            return view('puntosAtencion/create',['msg'=>$msg]);
        }else if(isset($valPuntoAtencion)){
            $msg="Nombre punto de atencion no valido";
            return view('puntosAtencion/create',['msg'=>$msg]);
        }else{
            try{

                $mUsuario->name=$request->name;
                $mUsuario->email=$request->email;
                $mUsuario->cedula=$request->cedula;
                $mUsuario->password=bcrypt($request->password);
                $mUsuario->save();

                $mPuntoAtencion->nombre=$request->nombrePuntoAtencion;
                $mPuntoAtencion->direccion=$request->direccion;
                $mPuntoAtencion->actividad=$request->actividad;
                $mPuntoAtencion->nombre_empresa=$request->nombre_empresa;
                $mPuntoAtencion->nit_empresa=$request->nit_empresa;

                $mPuntoAtencion->getIdusuario()->associate($mUsuario);
                $mPuntoAtencion->save();

                return redirect('puntosAtencion');

            }catch(\Illuminate\Database\QueryException $e) {
                return view('puntosAtencion/create',['msg'=>'no se pudo crear punto de atencion']);
            } 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('puntosAtencion/viewId', ['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view('puntosAtencion/edit', ['id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         return new Response('puntosAtencionController: update id:'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         return new Response('puntosAtencionController: destroy id:'.$id);
    }
}


