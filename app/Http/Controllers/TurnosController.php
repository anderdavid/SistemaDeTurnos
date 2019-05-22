<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Turno;

class TurnosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function takeTurn(){
        return view('clienteViewTurnos', ['name' => 'James']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente =new Cliente();
        $cliente->nombre=$request->name;
        $cliente->cedula=$request->cedula;
        $cliente->punto_de_atencion_id="1";
        $cliente->save();

        $turno = new Turno();
        $turno->tiempoAsignado ="2019-21-05_18:21:00";
        $turno->tiempoDespachado="";
        $turno->clase="k23";
        $turno->numero="02";
        $turno->status="asignado";
        $turno->getIdClient()->associate($cliente);
        $turno->puesto_id="01";
        $turno->oficinista_id="2";
        $turno->punto_de_atencion_id="1";

        if($turno->save()){
            echo "turno guardado";
        }



      /*  $table->string('tiempoAsignado');
            $table->string('tiempoDespachado');
            $table->string('clase'); //prefijo
            $table->string('numero');
            $table->string('status');
            
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->integer('puesto_id');
            $table->integer('oficinista_id');
            $table->string('punto_de_atencion_id');*/


       /*  $table->string('punto_de_atencion_id');*/
         /*$table->string('nombre');
            $table->string('cedula');*/


        /* echo "create turnos";*/
        /* echo $request->name."<br>";
         echo $request->cedula."<br>";*/

         //crear cliente


        /*  $mUsuario = new usuario;
        $mAdminitrador =new administrador;

        $mUsuario->nombre=$request->nombre;
        $mUsuario->apellido=$request->apellido;
        $mUsuario->cedula=$request->cedula;
        $mUsuario->cargo=$request->cargo;
        $mUsuario->email=$request->email;
        $mUsuario->save();

        $mAdminitrador->login=$request->login;
        $mAdminitrador->password=$request->password;
        $mAdminitrador->oficina=$request->oficina;
       

        $mAdminitrador->getIdusuario()->associate($mUsuario);
        $mAdminitrador->save();*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
