<?php

use Illuminate\Database\Seeder;

class aprobadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aprobados')->insert([
        
	    	'id_usuario' => '2',
	        'id_materia' => '1',
	        'ultima' => '1',
	    ]);
	    DB::table('aprobados')->insert([
        
	    	'id_usuario' => '2',
	        'id_materia' => '2',
	        'ultima' => '1',
	    ]);
	    DB::table('aprobados')->insert([
        
	    	'id_usuario' => '2',
	        'id_materia' => '3',
	        'ultima' => '1',
	    ]);
	    DB::table('aprobados')->insert([
        
	    	'id_usuario' => '2',
	        'id_materia' => '4',
	        'ultima' => '1',
	    ]);
	    DB::table('aprobados')->insert([
        
	    	'id_usuario' => '2',
	        'id_materia' => '5',
	        'ultima' => '1',
	    ]);
	    DB::table('aprobados')->insert([
        
	    	'id_usuario' => '2',
	        'id_materia' => '6',
	        'ultima' => '1',
	    ]);
	    DB::table('aprobados')->insert([
        
	    	'id_usuario' => '2',
	        'id_materia' => '11',
	        'ultima' => '0',
	    ]);
	    DB::table('aprobados')->insert([
        
	    	'id_usuario' => '2',
	        'id_materia' => '16',
	        'ultima' => '1',
	    ]);
    }
}
