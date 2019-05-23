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

    public function User(){
        return $this->hasOne('App\User','user_id');
    }

   /* 
        $table->integer('user_id');
    */

}
