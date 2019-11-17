<?php

namespace App;

use App\Enums\TipoEventoEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Plank\Mediable\Mediable;
use Spatie\Searchable\Searchable;

class Evento extends Model implements Searchable
{
    use EnumCastable;
    use Mediable;

    protected $casts = [
        'tipo'  =>  TipoEventoEnum::class
    ];

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    
    protected $midias = [
        'foto', 'video'
    ];

    public static $searchable = [
        'titulo', 'local', 'descricao', 'inicio', 'fim'
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
            route('eventos.show', $this)
        );
    }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function confirmados()
    {
        return $this->belongsToMany(User::class)->as('confirmacao');
    }
}
