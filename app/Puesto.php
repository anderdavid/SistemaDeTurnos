<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
   protected $table="puestos";


   public function turnos(){
      return $this->hasMany("App\Turno");
   }

   public function asuntos(){
        return $this->belongsToMany("App\Asunto")->withTimestamps();
    }

   public function getIdOficinista(){
        return $this->belongsTo('App\Oficinista', 'oficinista_id');
    }

   public function getIdPuntoDeAtencion(){
      return $this->belongsTo('App\PuntoDeAtencion', 'punto_de_atencion_id');
   }





 /*
   $table->integer('punto_de_atencion_id'); //puntos_de_atencion
   $table->integer('oficinista_id'); //oficinistas
 */
}
