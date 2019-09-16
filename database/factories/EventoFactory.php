<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anexo;
use App\Evento;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Evento::class, function (Faker $faker) {
    return [
        'titulo'    =>  $faker->realText($faker->numberBetween(10, 30)),
        'local'     =>  $faker->address,
        'descricao' =>  $faker->realText(),
        'inicio'    =>  $faker->dateTime,
        'fim'       =>  $faker->dateTime
    ];
});
