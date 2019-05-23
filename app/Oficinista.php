<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficinista extends Model
{
	protected $table="oficinistas";

    public function turnos(){
       return $this->hasMany('App\Turno');
    }

	  public function getIdPuntoDeAtencion(){
    	return $this->belongsTo('App\PuntoDeAtencion', 'punto_de_atencion_id');
    }

   	public function puesto(){
       return $this->hasOne('App\Puesto','puesto_id');
   	}


    /* 
       $table->integer('punto_de_atencion_id');
       $table->integer('puesto_id');
|    */
}
