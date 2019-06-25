<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{	
	protected $table="turnos";

    public function getIdCliente(){
    	return $this->belongsTo('App\Cliente','cliente_id');
    }

    public function getIdOficinista(){
    		return $this->belongsTo('App\Oficinista', 'oficinista_id'); 
    }
    public function getIdAsunto(){
            return $this->belongsTo('App\Asunto', 'asunto_id');
    }

    public function getIdPuesto(){
            return $this->belongsTo('App\Puesto', 'puesto_id');
    }
    public function getIdPuntoDeAtencion(){
            return $this->belongsTo('App\PuntoDeAtencion', 'punto_de_atencion_id');
    }
  

   

    
/*
    $table->integer('cliente_id'); //clientes
    $table->integer('oficinista_id');  //oficinistas
    $table->integer('asunto_id');  //asuntos
    $table->integer('puesto_id');//puestos
    $table->integer('punto_de_atencion_id'); //puntos_de_atencion
*/
}
