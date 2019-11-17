<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\TipoEventoEnum;
use App\Evento;
use Faker\Generator as Faker;

$factory->define(Evento::class, function (Faker $faker) {
    return [
        'titulo'    =>  $faker->realText($faker->numberBetween(10, 30)),
        'tipo'      =>  TipoEventoEnum::randomValue(),
        'local'     =>  $faker->address,
        'descricao' =>  $faker->realText(),
        'inicio'    =>  $faker->dateTime,
        'fim'       =>  $faker->dateTime
    ];
});
