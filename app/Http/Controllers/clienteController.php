<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use \App\Cliente;


class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $cliente = new Cliente;
       $cliente->setTable("clientes1");
       $clientes = $cliente->get();
      
      return view('clientes/viewClientes', ['clientes' =>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes/createtable');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTable(){
        $puntoAtencionId =17;

        if($this->createTableClients($puntoAtencionId)){
           DB::insert("INSERT INTO clientes".$puntoAtencionId." VALUES(id,'pablito','1082736234','ckta medica',now(),now(),15);");

           DB::insert("INSERT INTO clientes".$puntoAtencionId." VALUES(id,'pedrito','1082736233','ckta medica',now(),now(),15);");

           DB::insert("INSERT INTO clientes".$puntoAtencionId." VALUES(id,'maria','1082736231','ckta medica',now(),now(),15);");
        }
        
       /* $clientes=DB::select('SELECT *FROM clientes'.$puntoAtencionId, [1]);*/

       $cliente = new Cliente;
       $cliente->setTable("clientes".$puntoAtencionId);
       $clientes = $cliente->get();
         
        return view('clientes/viewClientes', ['clientes' =>$clientes]);
     }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTableClients($id){
        $query='CREATE TABLE if not exists clientes'.$id.'(
        id INT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(255) NOT NULL,
        cedula VARCHAR(255) NOT NULL,
        asunto VARCHAR(255) NOT NULL,
        created_at  TIMESTAMP NULL DEFAULT NULL,
        updated_at  TIMESTAMP NULL DEFAULT NULL,
        punto_de_atencion_id BIGINT(20) UNSIGNED not null,
        FOREIGN KEY (punto_de_atencion_id) REFERENCES `puntos_de_atencion`(id) ON DELETE CASCADE
        )';
        //echo $query."<br>";

         $clientes =DB::statement($query);

         if($clientes){
            return true;
         }
       
        
    }
    public function createTableSchema(){
        $puntoAtencionId =21;
        if($this->createTableClientsSchema($puntoAtencionId)){

           DB::insert("INSERT INTO clientes".$puntoAtencionId." VALUES(id,'pablito','1082736234','ckta medica',15,now(),now());");

           DB::insert("INSERT INTO clientes".$puntoAtencionId." VALUES(id,'pedrito','1082736233','ckta medica',15,now(),now());");

           DB::insert("INSERT INTO clientes".$puntoAtencionId." VALUES(id,'maria','1082736231','ckta medica',15,now(),now());");
        }

        $cliente = new Cliente;
        $cliente->setTable("clientes".$puntoAtencionId);
        $clientes = $cliente->get();
         
        return view('clientes/viewClientes', ['clientes' =>$clientes]);
    }
    public function createTableClientsSchema($id){
        if (!Schema::hasTable('clientes'.$id)) {

            Schema::create('clientes'.$id, function (Blueprint $table) {
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
        return true;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
