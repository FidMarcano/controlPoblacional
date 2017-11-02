<?php

use Illuminate\Database\Seeder;

class ciudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([
        
	    	'ciudad' => 'San Juan'
    	]);

    	DB::table('ciudades')->insert([
        
	    	'ciudad' => 'Villa de cura'
    	]);

    	DB::table('ciudades')->insert([
        
	    	'ciudad' => 'Cagua'
    	]);

    	DB::table('ciudades')->insert([
        
	    	'ciudad' => 'Maracay'
    	]);

    	DB::table('ciudades')->insert([
        
	    	'ciudad' => 'San Sebastian'
    	]);

    	DB::table('ciudades')->insert([
        
	    	'ciudad' => 'San Francisco'
    	]);

    	DB::table('ciudades')->insert([
        
	    	'ciudad' => 'Magdaleno'
    	]);

    	DB::table('ciudades')->insert([
        
	    	'ciudad' => 'San Casimiro'
    	]);

    	DB::table('ciudades')->insert([
        
	    	'ciudad' => 'Bella vista'
    	]);
    }
}
