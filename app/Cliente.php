<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cliente extends Model
{

	use \App\Traits\BindsDynamically;

	public function __construct($table)
    {
        $this->setTable($table);
      
    }

	public function turnos(){
    	return $this->hasMany("App\Turno"); 
    }

  	public function getIdPuntoDeAtencion(){
  		return $this->belongsTo('App\PuntoDeAtencion', 'punto_de_atencion_id');
  	}


}

 /* 
 	$table->integer('punto_de_atencion_id'); //puntos_de_atencion
 */
