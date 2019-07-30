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
            $table->integer('asunto_id')->unsigned();
            $table->integer('puesto_id')->unsigned();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('asunto_puesto'); 
        Schema::enableForeignKeyConstraints();
    }
}




