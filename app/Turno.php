<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Turno extends Model
{	
	//protected $table="turnos";
    protected $table="turnos10";
   

    public function getIdClient(){
    	return $this->belongsTo('App\Cliente','cliente_id');
    }

    public function getIdOficinista(){
		return $this->belongsTo('App\Oficinista', 'oficinista_id'); 
    }
    public function getIdPuesto(){
        return $this->belongsTo('App\Puesto', 'puesto_id');
    }

    public function getIdPuntoDeAtencion(){
		return $this->belongsTo('App\PuntoDeAtencion', 'punto_de_atencion_id');
    }


    public function setTable($table){
        $this->table =$table;
    }

    public function getTable(){
        return $this->table;
    }

   

    
/*
    $table->integer('cliente_id'); //clientes
    $table->integer('oficinista_id');  //oficinistas
    $table->integer('puesto_id');//puestos
    $table->integer('punto_de_atencion_id'); //puntos_de_atencion
*/
}
