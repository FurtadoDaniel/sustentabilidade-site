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
            $user->eventos()->save(factory(Evento::class)->make());
            $user->produtos()->save(factory(Produto::class)->make());
        });

        factory(Especie::class, 10)->create();
    }
}
