<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use Spatie\Searchable\Searchable;

class AbaixoAssinado extends Model implements Searchable
{
    use Mediable;

    public static $searchable = [
        'titulo', 'descricao', 'fim'
    ];

    protected $midias = [
        'foto', 'video'
    ];

    public function getMidias()
    {
        return $this->midias;
    }

    public function getSearchResult(): \Spatie\Searchable\SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->titulo,
            route('abaixo-assinados.show', $this)
        );
    }

    public function assinaturas(){
        return $this->hasMany('App\Assinaturas','abaixo_id','id');
    }
}
