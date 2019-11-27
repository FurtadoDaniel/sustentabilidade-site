<?php

namespace App;

use App\Enums\PostTypeEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Plank\Mediable\Mediable;
use Spatie\Searchable\Searchable;

class Post extends Model implements Searchable
{
    use EnumCastable;
    use Mediable;

    protected $casts = [
        'tipo' => PostTypeEnum::class
    ];
    protected $fillable = [
        'conteudo', 'tipo', 'titulo' 
    ];
    
    protected $midias = [
        'foto', 'video'
    ];

    public static $searchable = [
        'titulo', 'conteudo'
    ];

    public function getSearchResult(): \Spatie\Searchable\SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->titulo,
            route('posts.show', $this)
        );
    }
    
    public function scopeDoTipo($query, $tipo)
    {
        return $query->where('tipo', 'like', $tipo);
    }

    public function scopeNoticia($query)
    {
        return $query->doTipo(PostTypeEnum::NEWS);
    }

    public function scopeDepoimento($query)
    {
        return $query->doTipo(PostTypeEnum::DEPO);
    }

    public function scopeArtigo($query)
    {
        return $query->doTipo(PostTypeEnum::ARTI);
    }

    public function getMidias()
    {
        return $this->midias;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
