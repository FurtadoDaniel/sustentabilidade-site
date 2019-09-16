<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anexo;
use App\Especie;
use App\Evento;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Anexo::class, function (Faker $faker) {
    $type = $faker->randomElement([
        'especie', 'evento', 'post', 'produto'
        ]);

    switch ($type) {
        case 'especie':
            $anexavel = $faker->randomElement(
                Especie::doesntHave('anexo')->get()
            );
            $type = 'App\Especie';
            break;
        case 'evento':
            $anexavel = $faker->randomElement(
                Evento::doesntHave('anexo')->get()
            );
            $type = 'App\Evento';
            break;
        case 'post':
            $anexavel = $faker->randomElement(
                Post::doesntHave('anexo')->get()
            );
            $type = 'App\Post';
            break;
        case 'produto':
            $anexavel = $faker->randomElement(
                Especie::doesntHave('anexo')->get()
            );
            $type = 'App\Produto';
            break;
    }

    return [
        'nome'  =>  'image',
        'path'  =>  'storage\app\public\imagem.jpg',
        'anexavel_type' =>  $type   ,
        'anexavel_id'   =>  $anexavel->id
    ];
});
