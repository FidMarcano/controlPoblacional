<?php

use Illuminate\Database\Seeder;

class motivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivos')->insert([
        
	    	'motivo' => 'trabajo'
    	]);

    	DB::table('motivos')->insert([
        
	    	'motivo' => 'dificultad para el transporte'
    	]);

    	DB::table('motivos')->insert([
        
	    	'motivo' => 'familia'
    	]);

    	DB::table('motivos')->insert([
        
	    	'motivo' => 'otro'
    	]);
    }
}
