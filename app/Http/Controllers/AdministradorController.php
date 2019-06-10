<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\User;
use \App\Role;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('SuperAdministrador');

        $nombre = $request->get('nombre');
        $cedula =$request->get('cedula');

        $administradores = DB::table('users')
                            ->join('role_user', 'role_user.user_id','=','users.id')
                            ->join('roles', 'role_user.role_id','=','roles.id')
                            ->join('puntos_de_atencion', 'puntos_de_atencion.user_id','=','users.id')
                            ->select('users.*','puntos_de_atencion.nombre as punto_de_atencion')
                            ->where('roles.name','Administrador')
                            ->where('users.name','LIKE',"%$nombre%")
                            ->where('users.cedula','LIKE',"%$cedula%")
                            ->orderBy('id', 'ASC')
                            ->paginate(5);
                             
       return view('administradores/view', compact('administradores'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('SuperAdministrador');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles('SuperAdministrador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {   
        $request->user()->authorizeRoles('SuperAdministrador');

        $administrador = User::find($id);
        $puntoAtencion = User::find($id)->puntoDeAtencion;

        return view('puntosAtencion/viewId',
            ['puntoAtencion'=>$puntoAtencion,'administrador'=>$administrador]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles('SuperAdministrador');
        $administrador = User::find($id);
        $puntoAtencion = User::find($id)->puntoDeAtencion;

        return view('puntosAtencion/edit',
            ['puntoAtencion'=>$puntoAtencion,'administrador'=>$administrador]);
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
        $request->user()->authorizeRoles('SuperAdministrador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles('SuperAdministrador');
        $administrador = User::find($id);
        $puntoAtencion = User::find($id)->puntoDeAtencion;

        return redirect('/puntosAtencion/destroy/'.$puntoAtencion->id);
    }
}
