<?php

use App\Especie;
use App\Evento;
use App\Post;
use App\Produto;
use App\User;
use Illuminate\Database\Seeder;
use Plank\Mediable\MediaUploaderFacade;

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
            $user->posts()->save(factory(Post::class)->make())->attachMedia(MediaUploaderFacade::fromSource(
                'https://mumbrella.com.au/wp-content/uploads/2018/07/Australia-Post-red-post-box.jpeg'
            )->upload(), 'foto');
            $user->eventos()->save(factory(Evento::class)->make());
            $user->produtos()->save(factory(Produto::class)->make())->attachMedia(MediaUploaderFacade::fromSource(
                'https://mumbrella.com.au/wp-content/uploads/2018/07/Australia-Post-red-post-box.jpeg'
            )->upload(), 'foto');
        });

        factory(Especie::class, 10)->create()->each(function ($especie) {
            $especie->attachMedia(MediaUploaderFacade::fromSource(
                'https://cdn.vidanimal.com.br/wp-content/uploads/aves-de-rapina2.jpg'
            )->upload(), 'foto');
        });
    }
}
