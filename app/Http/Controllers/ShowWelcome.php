<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Post;
use Illuminate\Http\Request;

class ShowWelcome extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $noticias   =   Post::noticia()->get();
        $videos     =   [
            [
            'titulo'    => '1 video',
            'url'       => 'https://www.youtube.com/embed/O3rpmctmC_M'
            ]
        ];
        $eventos    =   Evento::all();
        $depoimentos=   Post::depoimento()->get();

        return view('welcome', [
            'noticias'      =>  $noticias,
            'videos'        =>  $videos,
            'eventos'       =>  $eventos,
            'depoimentos'   =>  $depoimentos
        ]);
    }
}
