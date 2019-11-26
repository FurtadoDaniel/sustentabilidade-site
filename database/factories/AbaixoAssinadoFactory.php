<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AbaixoAssinado;
use Faker\Generator as Faker;

$factory->define(AbaixoAssinado::class, function (Faker $faker) {
    
    return [
        'titulo'    =>  $faker->words(3, true),
        'descricao' =>  $faker->realText(),
        'meta'      =>  '100000',
        'fim'       =>  $faker->date(),
    ];
});
