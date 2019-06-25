<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asuntos extends Model
{
	protected $table="asuntos";

    public function turnos(){
    	return $this->hasMany("App\Turno"); 
    }

    public function puestos(){
        return $this->belongsToMany("App\Puesto")->withTimestamps();
     }

    public function getIdPuntoDeAtencion(){
   		return $this->belongsTo('App\PuntoDeAtencion', 'punto_de_atencion_id');
   }
}

/*
    $table->integer('punto_de_atencion_id'); //puntos_de_atencion
*/
