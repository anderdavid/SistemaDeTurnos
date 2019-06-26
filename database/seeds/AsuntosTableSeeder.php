<?php

use Illuminate\Database\Seeder;
use \App\Asunto;

class AsuntosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asunto =new Asunto();
		$asunto->nombre_asunto="tramites";
		$asunto->punto_de_atencion_id=1;
		$asunto->save();

		for($i=0;$i<50;$i++){
			$asunto =new Asunto();
			$asunto->nombre_asunto="tramites".$i;
			$asunto->punto_de_atencion_id=1;
			$asunto->save();
		}
    }
}
