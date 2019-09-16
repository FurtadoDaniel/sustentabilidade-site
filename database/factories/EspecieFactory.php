<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\IucnRedListEnum;
use App\Especie;
use Faker\Generator as Faker;

$factory->define(Especie::class, function (Faker $faker) {
    return [
        'nome'              =>  $faker->words(1, true),
        'nome_cientifico'   =>  $faker->words($faker->numberBetween(2, 5), true),
        'descricao'         =>  $faker->realText(),
        'extincao'          =>  IucnRedListEnum::randomValue()
    ];
});