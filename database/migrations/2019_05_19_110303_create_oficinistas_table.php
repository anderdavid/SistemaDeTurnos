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
            $table->string('cargo');
            $table->string('genero')->default("Masculino");
            $table->string('email')->unique();
            $table->string('password');
            
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
		Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('oficinistas');
		
        Schema::enableForeignKeyConstraints();
    }
}


