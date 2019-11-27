<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\ProductTypeEnum;
use App\Produto;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    return [
        'nome'      =>  $faker->words(2, true),
        'descricao' =>  $faker->realText(),
        'preco'     =>  0.00,
        'tipo'      =>  $faker->randomElement(ProductTypeEnum::values())
    ];
});
