<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinistas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('cedula');
            $table->string('email')->unique();
            $table->string('password');
            
            $table->unsignedBigInteger('punto_de_atencion_id');                
            $table->foreign('punto_de_atencion_id')
                  ->references('id')->on('puntos_de_atencion')
                  ->onDelete('cascade');
            
            $table->unsignedBigInteger('puesto_id');                
            $table->foreign('puesto_id')
                  ->references('id')->on('puestos')
                  ->onDelete('cascade');
            

            $table->timestamps();
        });
    }

     /* 
     $table->integer('punto_de_atencion_id'); //puntos_de_atencion
     $table->integer('puesto_id'); //puestos
     
|    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oficinistas');
    }
}
