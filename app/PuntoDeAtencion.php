<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntoDeAtencion extends Model
{
    protected $table="puntos_de_atencion";
    
    public function clientes(){
		return $this->hasMany('App\Cliente');
    }

    public function turnos(){
		return $this->hasMany('App\Turno');
    }

    public function puestos(){
		return $this->hasMany('App\Puesto');
    }

    public function oficinistas(){
		return $this->hasMany('App\Oficinista');
    }

    public function getIdusuario(){
            return $this->belongsTo('App\User', 'user_id');
    }

   public function scopeNombre($query,$nombre){
        if($nombre){
            return $query->where('nombre','LIKE',"%nombre%");
        }
   }

 /* $table->string('nombre')->unique();
            $table->string('direccion');
            $table->string('actividad');
            $table->string('nombre_empresa');
            $table->string('nit_empresa');*/

 

}
