<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search as SpatieSearch;

class Search extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $searchResults = (new SpatieSearch())
            ->registerModel(\App\AbaixoAssinado::class, \App\AbaixoAssinado::$searchable)
            ->registerModel(\App\Especie::class, \App\Especie::$searchable)
            ->registerModel(\App\Evento::class, \App\Evento::$searchable)
            ->registerModel(\App\Post::class, \App\Post::$searchable)
            ->registerModel(\App\Produto::class, \App\Produto::$searchable)
            ->search($request->search);

        return view('search', [
            'searchResults' =>  $searchResults,
            'pesquisa'      =>  $request->search
            ]
        );
    }
}
