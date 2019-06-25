<?php
	
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreatePuntoDeAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos_de_atencion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            $table->string('direccion');
            $table->string('actividad');
            $table->string('nombre_empresa');
            $table->string('nit_empresa');
            $table->unsignedBigInteger('user_id');                
          /*  $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');*/
            
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }
    /*
      $table->integer('user_id');//usuarios
    */


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('puntos_de_atencion');
		
		Schema::enableForeignKeyConstraints();
    }
}

