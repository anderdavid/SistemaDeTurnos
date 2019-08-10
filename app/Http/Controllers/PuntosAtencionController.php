<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Redirect;
use \App\PuntoDeAtencion;
use \App\User;
use \App\Role;

class PuntosAtencionController extends Controller
{
   public $puntoAtencionId=0;

    public function __construct()
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
       $request->user()->authorizeRoles('SuperAdministrador');

       $nombre = $request->get('nombre');
       $empresa =$request->get('empresa');
    
       $puntosAtencion = DB::table('puntos_de_atencion')
                            ->join('users', 'users.id', '=', 'puntos_de_atencion.user_id')
                            ->select('puntos_de_atencion.*', 'users.name as administrador')
                            ->where('nombre','LIKE',"%$nombre%")
                            ->where('nombre_empresa','LIKE',"%$empresa%")
                            ->orderBy('id', 'ASC')
                            ->paginate(5);
                            
        return view('puntosAtencion/view', compact('puntosAtencion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $request->user()->authorizeRoles('SuperAdministrador');
		 $mUser = new User;
         return view('puntosAtencion/create',['user'=>$mUser]);
         
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

        $mUsuario = new User;
        $mPuntoAtencion = new PuntoDeAtencion;

        $role_admin = Role::where('name','Administrador')->first();

        $valUsuario =User::where('email',$request->email)->first();
        $valPuntoAtencion =PuntoDeAtencion::where('nombre',$request->nombrePuntoAtencion)->first();

        if(isset($valUsuario)&&$valUsuario!=null){
            $msg="Email ya existe";
            return view('puntosAtencion/create',['msg'=>$msg]);
        }else if(isset($valPuntoAtencion)&&$valPuntoAtencion!=null){
            $msg="Nombre punto de atencion no valido";
            return view('puntosAtencion/create',['msg'=>$msg,'user'=>$request]);
        }else{
            try{

                $mUsuario->name=$request->name;
                $mUsuario->email=$request->email;
                $mUsuario->cedula=$request->cedula;
                $mUsuario->password=bcrypt($request->password);
                $mUsuario->save();
                $mUsuario->roles()->attach($role_admin);

                $mPuntoAtencion->nombre=$request->nombrePuntoAtencion;
                $mPuntoAtencion->direccion=$request->direccion;
                $mPuntoAtencion->actividad=$request->actividad;
                $mPuntoAtencion->nombre_empresa=$request->nombre_empresa;
                $mPuntoAtencion->nit_empresa=$request->nit_empresa;

                $mPuntoAtencion->getIdusuario()->associate($mUsuario);
                $mPuntoAtencion->save();

                $this->puntoAtencionId =$mPuntoAtencion->id;

                if(!$this->createTableCliente()){
                    printf("Error al crear tabla clientes".$this->puntoAtencionId);
                  
               }else if(!$this->createTableTurno()){
                    printf("Error al crear tabla turnos".$this->puntoAtencionId);
               }else{
                    return redirect('puntosAtencion'); 
               }

                

               /*echo "here <br>";
               echo "puntoAtencionId: ".$mPuntoAtencion->id;*/

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
    public function show(Request $request,$id)
    {
        $request->user()->authorizeRoles('SuperAdministrador');

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
    public function edit(Request $request,$id)
    {
         $request->user()->authorizeRoles('SuperAdministrador');

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
        $request->user()->authorizeRoles('SuperAdministrador');

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

         /*   print_r($valAdministrador); //_deb*/
            $msg="Email no valido";

            return view('puntosAtencion/edit',
                ['puntoAtencion'=>$puntoAtencion,
                    'administrador'=>$administrador,
                    'msg'=>$msg
                    ]);

        }else if(isset($valPuntoAtencion)&&$valPuntoAtencion!=null){

           /* print_r($valPuntoAtencion); //_deb*/
           
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
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles('SuperAdministrador');

        $userId=\App\PuntoDeAtencion::find($id)->getIdusuario->id;
        $deleteUser = \App\User::where('id',$userId)->delete();
        return redirect('puntosAtencion');
    }

    public function createTableCliente(){

        if (!Schema::hasTable('clientes'.$this->puntoAtencionId)) {
            Schema::create('clientes'.$this->puntoAtencionId, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('cedula');
            $table->string('asunto');
            
            $table->unsignedBigInteger('punto_de_atencion_id');                
            $table->foreign('punto_de_atencion_id')
                  ->references('id')->on('puntos_de_atencion')
                  ->onDelete('cascade');
            
            $table->timestamps();
            });
            
        }
        if(Schema::hasTable('clientes'.$this->puntoAtencionId)){
            return true;
        }else{
            return false;
        }
       
    }

    public function createTableTurno(){
        if (!Schema::hasTable('turnos'.$this->puntoAtencionId)) {

            Schema::create('turnos'.$this->puntoAtencionId, function (Blueprint $table) {

                $table->bigIncrements('id');
                $table->string('tiempoAsignado');
                $table->string('tiempoDespachado');
                $table->string('clase'); //prefijo
                $table->string('numero');
                $table->string('status');
                
                $table->unsignedBigInteger('cliente_id');                
                $table->foreign('cliente_id')
                    ->references('id')->on('clientes'.$this->puntoAtencionId)
                    ->onDelete('cascade');

                $table->unsignedBigInteger('oficinista_id');                
                $table->foreign('oficinista_id')
                    ->references('id')->on('oficinistas')
                    ->onDelete('cascade');


                $table->unsignedBigInteger('puesto_id');                
                $table->foreign('puesto_id')
                    ->references('id')->on('puestos')
                    ->onDelete('cascade');

                $table->unsignedBigInteger('punto_de_atencion_id');                
                $table->foreign('punto_de_atencion_id')
                    ->references('id')->on('puntos_de_atencion')
                    ->onDelete('cascade');
                
                $table->timestamps();
            });
        }

         if(Schema::hasTable('turnos'.$this->puntoAtencionId)){
            return true;
        }else{
            return false;
        }
        
    }
}


