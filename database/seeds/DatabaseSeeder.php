<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(adminSeeder::class);
        $this->call(ciudadesSeeder::class);
        $this->call(bloquesSeeder::class);
        $this->call(motivosSeeder::class);
        $this->call(materiasSeeder::class);
        $this->call(aprobadosSeeder::class);
        $this->call(encuestaSeeder::class);

        factory(App\User::class, 100)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
