<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero');
            $table->string('descripcion');
            $table->integer('punto_de_atencion_id');
            $table->integer('turno_id');
            $table->integer('turno_id');
            $table->timestamps();
        });

/* 
   $table->integer('punto_de_atencion_id');
   $table->integer('turno_id');
   $table->integer('turno_id');
 */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puestos');
    }
}
