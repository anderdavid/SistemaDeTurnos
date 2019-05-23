<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('cedula');
            
            $table->unsignedBigInteger('punto_de_atencion_id');                
            $table->foreign('punto_de_atencion_id')
                  ->references('id')->on('puntos_de_atencion')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /* 
    $table->integer('punto_de_atencion_id'); //puntos_de_atencion
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
