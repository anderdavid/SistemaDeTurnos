<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Oficinista;

class OficinistasController extends Controller
{
     public function __construct(Request $request)
     {
        $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $oficinistas =\App\Oficinista::where('punto_de_atencion_id',$pId)->get();

        return view('/oficinistas/viewOficinistas',
                ['puntoAtencionId'=>$pId,'oficinistas'=>$oficinistas]);
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
        return view('/oficinistas/createOficinistas',['puntoAtencionId'=>$pId]);
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
        
        echo json_encode($request->all());

        $oficinista = new Oficinista;
        $oficinista->nombre =$request->nombre;
        $oficinista->cedula=$request->cedula;
        $oficinista->email=$request->email;
        $oficinista->password=bcrypt($request->password);
        $oficinista->punto_de_atencion_id=$pId;
        $oficinista->save();

        return redirect('/oficinistas');
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');
        return view('/oficinistas/viewOficinistasId',['id'=>$id,'puntoAtencionId'=>$pId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');
        
        $oficinista =Oficinista::find($id);
       
        return view('/oficinistas/editOficinistas',['oficinista'=>$oficinista]);
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
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');
        echo json_encode($request->all());

        $oficinista =Oficinista::find($id);

        $oficinista->nombre =$request->nombre;
        $oficinista->cedula=$request->cedula;
        $oficinista->email=$request->email;
        $oficinista->password=bcrypt($request->password);
        $oficinista->punto_de_atencion_id=$pId;
        $oficinista->save();
        
         return redirect('/oficinistas');
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
        return new Response("hello world destroy id: ".$id."\n"."puntoAtencionId: ".$pId);
    }
}
