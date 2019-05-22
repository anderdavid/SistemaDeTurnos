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

    public function getIdTurno(){
    		return $this->belongsTo('App\Turno', 'turno_id');
    }


    /* $table->string('punto_de_atencion_id');*/
}
