<?php

use Illuminate\Database\Seeder;

class encuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('encuestas')->insert([
        
	    	'id_materia' => '0',
	    	'id_bloque' => '0',
	    	'id_motivo' => '0',
	    	'id_user' => '0'
    	]);

    }
}
