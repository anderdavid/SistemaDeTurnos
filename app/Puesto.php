<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
   protected $table="puestos";

   public function getIdPuntoDeAtencion(){
   		return $this->belongsTo('App\PuntoDeAtencion', 'punto_de_atencion_id');
   }

   public function getIdTurno(){
   		return $this->belongsTo('App\Turno', 'turno_id');
   }

 /*   $table->string('punto_de_atencion_id');*/
}
