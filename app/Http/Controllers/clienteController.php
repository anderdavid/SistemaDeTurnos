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

       $cliente = new Cliente;
       $table="clientes".$request->session()->get('puntoAtencionId');
       $cliente->setTable($table);

       $clientes = $cliente->get();
       return view('clientes/viewClientes', ['clientes' =>$clientes]);
    
    }

     public function index2(Request $request)
    {
       $request->user()->authorizeRoles('Administrador'); 
       $cliente = new Cliente;
       

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
        /*return view('clientes/createtable');*/
         $request->user()->authorizeRoles('Administrador');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function createTable(){
        $puntoAtencionId =17;

        if($this->createTableClients($puntoAtencionId)){
           DB::insert("INSERT INTO clientes".$puntoAtencionId." VALUES(id,'pablito','1082736234','ckta medica',now(),now(),15);");

           DB::insert("INSERT INTO clientes".$puntoAtencionId." VALUES(id,'pedrito','1082736233','ckta medica',now(),now(),15);");

           DB::insert("INSERT INTO clientes".$puntoAtencionId." VALUES(id,'maria','1082736231','ckta medica',now(),now(),15);");
        }
        
       //$clientes=DB::select('SELECT *FROM clientes'.$puntoAtencionId, [1]);

       $cliente = new Cliente;
       $cliente->setTable("clientes".$puntoAtencionId);
       $clientes = $cliente->get();
         
        return view('clientes/viewClientes', ['clientes' =>$clientes]);
     }*/
     
   
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles('Administrador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request->user()->authorizeRoles('Administrador');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request->user()->authorizeRoles('Administrador');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $request->user()->authorizeRoles('Administrador');
    }
}
