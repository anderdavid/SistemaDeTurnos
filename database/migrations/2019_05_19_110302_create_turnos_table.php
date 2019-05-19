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
            $table->integer('cliente_id');
            $table->integer('puesto_id');
            $table->integer('oficinista_id');
            $table->string('punto_de_atencion_id');
            $table->timestamps();
        });
    }

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
