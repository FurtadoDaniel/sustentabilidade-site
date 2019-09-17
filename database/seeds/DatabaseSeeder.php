<?php

use App\Anexo;
use App\Especie;
use App\Evento;
use App\Post;
use App\Produto;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function ($user) {
            $user->posts()->save(factory(Post::class)->make());
            $anexo = new Anexo([
                'nome'  =>  'image',
                'path'  =>  'storage\app\public\imagem.jpg',
                'anexavel_type' => 'App\Post',
                'anexavel_id' => $user->posts()->first()->id
            ]);
            $anexo->save();
            $user->eventos()->save(factory(Evento::class)->make());
            $anexo = new Anexo([
                'nome'  =>  'image',
                'path'  =>  'storage\app\public\imagem.jpg',
                'anexavel_type' => 'App\Evento',
                'anexavel_id' => $user->eventos()->first()->id
            ]);
            $anexo->save();
            $user->produtos()->save(factory(Produto::class)->make());
            $$anexo = new Anexo([
                'nome'  =>  'image',
                'path'  =>  'storage\app\public\imagem.jpg',
                'anexavel_type' => 'App\Produto',
                'anexavel_id' => $user->produtos()->first()->id
            ]);
            $anexo->save();
        });

        factory(Especie::class, 10)->create()->each(function ($especie) {
            $anexo = new Anexo([
                'nome'  =>  'image',
                'path'  =>  'storage\app\public\imagem.jpg',
                'anexavel_type' => 'App\Especie',
                'anexavel_id' => $especie->id
            ]);
            $anexo->save();
        });

        //factory(Anexo::class, rand(1, 30))->create();
    }
}
