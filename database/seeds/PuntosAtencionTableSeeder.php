<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
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

		$user = new User();
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
       	$mPuntoAtencion->save();

       	if (!Schema::hasTable('clientes1')) {

            Schema::create('clientes1', function (Blueprint $table) {
	            $table->bigIncrements('id');
	            $table->string('nombre');
	            $table->string('cedula');
	            $table->string('asunto');
	            
	            $table->unsignedBigInteger('punto_de_atencion_id');                
	            $table->foreign('punto_de_atencion_id')
	                  ->references('id')->on('puntos_de_atencion')
	                  ->onDelete('cascade');
	            
	            $table->timestamps();
            });
            
        }

         if (!Schema::hasTable('turnos1')) {

            Schema::create('turnos1', function (Blueprint $table) {

                $table->bigIncrements('id');
                $table->string('tiempoAsignado');
                $table->string('tiempoDespachado');
                $table->string('clase'); //prefijo
                $table->string('numero');
                $table->string('status');
                
                $table->unsignedBigInteger('cliente_id');                
                $table->foreign('cliente_id')
                    ->references('id')->on('clientes1')
                    ->onDelete('cascade');

                $table->unsignedBigInteger('oficinista_id');                
                $table->foreign('oficinista_id')
                    ->references('id')->on('oficinistas')
                    ->onDelete('cascade');


                $table->unsignedBigInteger('puesto_id');                
                $table->foreign('puesto_id')
                    ->references('id')->on('puestos')
                    ->onDelete('cascade');

                $table->unsignedBigInteger('punto_de_atencion_id');                
                $table->foreign('punto_de_atencion_id')
                    ->references('id')->on('puntos_de_atencion')
                    ->onDelete('cascade');
                
                $table->timestamps();
            });
        }

      /* 	for ($i=0; $i <13 ; $i++) { 
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
       	}*/

    }
}
