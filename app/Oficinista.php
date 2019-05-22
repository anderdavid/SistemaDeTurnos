<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficinista extends Model
{
	protected $table="oficinistas";
	
    public function turnos(){
       return $this->hasMany('App\Turno');
     }
}
