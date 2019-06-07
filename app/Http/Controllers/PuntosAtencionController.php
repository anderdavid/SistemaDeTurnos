<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
       $puntosAtencion = DB::table('puntos_de_atencion')
                            ->join('users', 'users.id', '=', 'puntos_de_atencion.user_id')
                            ->select('puntos_de_atencion.*', 'users.name as administrador')
                            ->get();
       
        return view('puntosAtencion/view', ['puntosAtencion' =>$puntosAtencion]);
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

        if(isset($valUsuario)&&$valUsuario!=null){
            $msg="Email ya existe";
            return view('puntosAtencion/create',['msg'=>$msg]);
        }else if(isset($valPuntoAtencion)&&$valPuntoAtencion!=null){
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
                return view('puntosAtencion/create',['msg'=>'no se pudo crear punto de atencion ']);
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
        $puntoAtencion = PuntoDeAtencion::find($id);
        $administrador = PuntoDeAtencion::find($id)->getIdusuario;

       /* print($puntoAtencion);
        print($administrador);*/
        
         return view('puntosAtencion/viewId',
            ['puntoAtencion'=>$puntoAtencion,'administrador'=>$administrador]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $puntoAtencion = PuntoDeAtencion::find($id);
         $administrador = PuntoDeAtencion::find($id)->getIdusuario;

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
        $puntoAtencion = PuntoDeAtencion::find($id);
        $administrador = PuntoDeAtencion::find($id)->getIdusuario;
        
        $queryValAdministrador="SELECT *FROM users 
                WHERE 
                email ='".$request->email."' AND id !=".$administrador->id;

        $valAdministrador = DB::select($queryValAdministrador,[1]);


        $queryValPuntoAtencion="SELECT *FROM puntos_de_atencion
                WHERE
                nombre ='".$request->nombrePuntoAtencion."' AND id!=".$puntoAtencion->id;
        $valPuntoAtencion=DB::select($queryValPuntoAtencion,[1]);
        
         /* print_r($valAdministrador);
        echo $queryValAdministrador."<br>";

        print_r($valPuntoAtencion);
        echo $queryValPuntoAtencion."<br>";*/

        if(isset($valAdministrador)&&$valAdministrador!=null){

            print_r($valAdministrador);
            $msg="Email no valido";

            return view('puntosAtencion/edit',
                ['puntoAtencion'=>$puntoAtencion,
                    'administrador'=>$administrador,
                    'msg'=>$msg
                    ]);

        }else if(isset($valPuntoAtencion)&&$valPuntoAtencion!=null){
            print_r($valPuntoAtencion);
            $msg="Nombre punto de atenccion no valido";

            return view('puntosAtencion/edit',
                ['puntoAtencion'=>$puntoAtencion,
                    'administrador'=>$administrador,
                    'msg'=>$msg
                    ]);
        }else{
            try{

                $administrador->name=$request->name;
                $administrador->email=$request->email;
                $administrador->cedula=$request->cedula;
                $administrador->password=bcrypt($request->password);
                $administrador->save();

                $puntoAtencion->nombre=$request->nombrePuntoAtencion;
                $puntoAtencion->direccion=$request->direccion;
                $puntoAtencion->actividad=$request->actividad;
                $puntoAtencion->nombre_empresa=$request->nombre_empresa;
                $puntoAtencion->nit_empresa=$request->nit_empresa;

                $puntoAtencion->getIdusuario()->associate($administrador);
                $puntoAtencion->save();

                return redirect('puntosAtencion');

            }catch(\Illuminate\Database\QueryException $e) {
                return view('puntosAtencion/create',['msg'=>'no se pudo actualizar punto de atencion ']);
            } 
        }

        

        //$superadministradores = DB::select('SELECT *FROM super_administradors', [1]);
        //return new Response('puntosAtencionController: update id:'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId=\App\PuntoDeAtencion::find($id)->getIdusuario->id;
        $deleteUser = \App\User::where('id',$userId)->delete();
        return redirect('puntosAtencion');
    }
}


