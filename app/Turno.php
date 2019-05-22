<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{	
	protected $table="turnos";

    public function getIdClient(){
    	return $this->belongsTo('App\Cliente','cliente_id');
    }

    public function getIdOficinista(){
    		return $this->belongsTo('App\Oficinista', 'oficinista_id'); 
    }

    public function getIdPuntoDeAtencion(){
    		return $this->belongsTo('App\PuntoDeAtencion', 'punto_de_atencion_id');
    }

    public function puesto(){
        return $this->hasOne('App\Puesto','puesto_id');
    }

    public function oficinista(){
        return $this->hasOne('App\Oficinista','oficinista_id');
    }
/*
    $table->integer('puesto_id');
    $table->integer('oficinista_id');
    $table->string('punto_de_atencion_id');*/
}
