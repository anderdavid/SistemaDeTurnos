<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('cedula');
            $table->string('asunto');
            
            $table->unsignedBigInteger('punto_de_atencion_id');                
            $table->foreign('punto_de_atencion_id')
                  ->references('id')->on('puntos_de_atencion')
                  ->onDelete('cascade');
            
            $table->timestamps(); 
        });*/
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

        $query ="SELECT CONCAT( 'DROP TABLE ', GROUP_CONCAT(table_name) , ';' ) 
                AS statement FROM information_schema.tables 
                WHERE table_schema='SistemaDeTurnos' AND table_name LIKE 'clientes%'";
        $queryDelete=DB::select($query, [1]);

        try {
           DB::statement($queryDelete[0]->statement);
       } catch (Exception $e) {
        
       }
       

        Schema::enableForeignKeyConstraints();

    }
}
