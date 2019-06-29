<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return view('/oficinistas/viewOficinistas',['puntoAtencionId'=>$pId]);



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
        return new Response("hello world store \n"."puntoAtencionId: ".$pId);
    
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
        return view('/oficinistas/editOficinistas',['id'=>$id,'puntoAtencionId'=>$pId]);
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
        return new Response("hello world update id: ".$id."\n"."puntoAtencionId: ".$pId);
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
