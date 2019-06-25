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
            
            $table->unsignedBigInteger('oficinista_id');                
            $table->foreign('oficinista_id')
                  ->references('id')->on('oficinistas')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('punto_de_atencion_id');                
            $table->foreign('punto_de_atencion_id')
                  ->references('id')->on('puntos_de_atencion')
                  ->onDelete('cascade');
            
            

            $table->timestamps();
        });

  /* 
   $table->integer('punto_de_atencion_id'); //puntos_de_atencion
   $table->integer('oficinista_id'); //oficinistas
 */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('puestos');
		Schema::enableForeignKeyConstraints();
    }
}
