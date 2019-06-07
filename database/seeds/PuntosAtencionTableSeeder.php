<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use \App\PuntoDeAtencion;

class PuntosAtencionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       	$role_admin = Role::where('name','Administrador')->first();

		/*$user = new User();
		$user->name ='administrador prueba';
		$user->email='admin@example.com';
		$user->cedula='826213122';
		$user->password = bcrypt('1234');
		$user->save();
		$user->roles()->attach($role_admin);

		$mPuntoAtencion =new PuntoDeAtencion();
		$mPuntoAtencion->nombre="banco de occidente oficina cali";
		$mPuntoAtencion->direccion="calle 25 #12b-59 Cali";
		$mPuntoAtencion->actividad="Entiddad Bancaria";
		$mPuntoAtencion->nombre_empresa="Banco de Occidente";
		$mPuntoAtencion->nit_empresa="3298271-0";

		$mPuntoAtencion->getIdusuario()->associate($user);
       	$mPuntoAtencion->save();*/

       	for ($i=0; $i <13 ; $i++) { 
       		$user = new User();
			$user->name ='administrador prueba'.$i;
			$user->email='admin@example'.$i.'.com';
			$user->cedula='826213122';
			$user->password = bcrypt('1234');
			$user->save();
			$user->roles()->attach($role_admin);

			$mPuntoAtencion =new PuntoDeAtencion();
			$mPuntoAtencion->nombre="banco".$i." de occidente oficina cali";
			$mPuntoAtencion->direccion="calle 25 #12b-59 Cali";
			$mPuntoAtencion->actividad="Entiddad Bancaria";
			$mPuntoAtencion->nombre_empresa="Banco de Occidente";
			$mPuntoAtencion->nit_empresa="3298271-0";

			$mPuntoAtencion->getIdusuario()->associate($user);
	       	$mPuntoAtencion->save();
       	}

    }
}
