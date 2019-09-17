<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\PostTypeEnum;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'tipo'      =>  PostTypeEnum::randomValue(),
        'titulo'    =>  $faker->realText($faker->numberBetween(10, 30)),
        'conteudo'  =>  $faker->realText()
    ];
});
