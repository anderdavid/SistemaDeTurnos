<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsuntosPuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asunto_puesto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asunto_id');                
            $table->foreign('asunto_id')
                  ->references('id')->on('asuntos')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('puesto_id');                
            $table->foreign('puesto_id')
                  ->references('id')->on('puestos')
                  ->onDelete('cascade');
            
            
            $table->timestamps(); 
        });
    }

     /*$table->integer('asunto_id')->unsigned();
            $table->integer('puesto_id')->unsigned();*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('asunto_puesto'); 
        Schema::enableForeignKeyConstraints();
    }
}




