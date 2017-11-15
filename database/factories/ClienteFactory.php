<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Model\Cliente::class, function (Faker $faker) {
    //static $password;

    return [
        'name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
        'ddd'=>'55',
        'fone1'=>'9985148425',
        'logradouro'=>'rua avios da gaviao',
        'numero'=>'12',
        'complemento'=>'casa',
        'data_aniversario'=>'12-05-1990',


        //'password' => $password ?: $password = bcrypt('secret'),
        //'remember_token' => str_random(10),
    ];
});