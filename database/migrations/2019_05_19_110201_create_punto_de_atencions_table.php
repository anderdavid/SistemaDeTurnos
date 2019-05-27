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
            $table->string('nombre_empresa');
            $table->string('nit_empresa');
            $table->string('nombre');
            $table->string('actividad');
            
            $table->unsignedBigInteger('usuario_id');                
            $table->foreign('usuario_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }
    /*
     $table->integer('usuario_id');//usuarios
    */


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntos_de_atencion');
    }
}