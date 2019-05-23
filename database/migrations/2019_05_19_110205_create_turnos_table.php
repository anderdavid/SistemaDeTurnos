<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tiempoAsignado');
            $table->string('tiempoDespachado');
            $table->string('clase'); //prefijo
            $table->string('numero');
            $table->string('status');
            
            $table->unsignedBigInteger('cliente_id');                
            $table->foreign('cliente_id')
                  ->references('id')->on('clientes')
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

    /*
    $table->integer('cliente_id'); //clientes
    $table->integer('oficinista_id');  //oficinistas
    $table->integer('puesto_id');//puestos
    $table->integer('punto_de_atencion_id'); //puntos_de_atencion
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
}
