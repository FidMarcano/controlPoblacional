<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $password;
        DB::table('users')->insert([
        
	    	'nombre' => 'Admin1',
	        'apellido' => 'Uno',
            'cedula'=>'14447885',
	        'email' => 'test1@gmail.com',
	        'id_ciudad' => '1',
            'residencia' => '0',
            'trabajo' => '1',
            'rol' => '2',
	        'nivel' => '2',
	        'estatus' => '0',
	        'uc_aprobadas' => '104',
	        'password' => $password ?: $password = bcrypt('123123123'),
	        'remember_token' => str_random(10)

    	]);


        DB::table('users')->insert([
        
            'nombre' => 'User1',
            'apellido' => 'Dos',
            'cedula'=>'14447888',
            'email' => 'test2@gmail.com',
            'id_ciudad' => '4',
            'residencia' => '0',
            'trabajo' => '0',
            'rol' => '1',
            'nivel' => '1',
            'estatus' => '0',
            'uc_aprobadas' => '19',
            'password' => $password ?: $password = bcrypt('123123123'),
            'remember_token' => str_random(10)

        ]);
    }
}
