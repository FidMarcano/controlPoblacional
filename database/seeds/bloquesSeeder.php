<?php

use Illuminate\Database\Seeder;

class bloquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloques')->insert([
        
	    	'bloque' => '7:00-9:20'
    	]);
    	DB::table('bloques')->insert([
        
	    	'bloque' => '9:20-11:40'
    	]);
    	DB::table('bloques')->insert([
        
	    	'bloque' => '13:00-15:20'
    	]);
    	DB::table('bloques')->insert([
        
	    	'bloque' => '15:20-17:00'
    	]);
    }
}
