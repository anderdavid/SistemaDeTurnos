<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntoDeAtencion extends Model
{
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

    public function usuario(){
        return $this->hasOne('App\Phone','user_id');
    }

}
