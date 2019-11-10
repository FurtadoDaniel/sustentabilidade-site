<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produto;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    return [
        'nome'      =>  $faker->words(2, true),
        'descricao' =>  $faker->realText(),
        'preco'     =>  $faker->randomFloat,
    ];
});
