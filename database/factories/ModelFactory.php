<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
       	'nombre' => $faker->firstname,
       	'apellido' => $faker->lastname,
       	'id_ciudad' =>  $faker->numberBetween($min = 1, $max = 9),
       	'estatus' => $faker->numberBetween($min = 0, $max = 1),
        'residencia' =>  $faker->numberBetween($min = 0, $max = 1),
        'trabajo' => $faker->numberBetween($min = 0, $max = 1),
        'rol' => $faker->numberBetween($min = 0, $max = 2),
       	'nivel' => 1,
       	'uc_aprobadas' => $faker->numberBetween($min = 0, $max = 150),
       	'cedula'=>$faker->unique()->numberBetween($min = 1, $max = 100),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123123123'),
        'remember_token' => str_random(10),
    ];
});
//secret





