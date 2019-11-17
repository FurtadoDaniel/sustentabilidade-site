<?php

namespace App;

use App\Enums\ProductTypeEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Plank\Mediable\Mediable;
use Spatie\Searchable\Searchable;

class Produto extends Model implements Searchable
{
    use EnumCastable;
    use Mediable;

    protected $casts = [
        'tipo' => ProductTypeEnum::class,
    ];

    protected $midias = [
        'foto', 'video'
    ];

    public static $searchable = [
        'nome', 'descricao'
    ];

    public function getSearchResult(): \Spatie\Searchable\SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->nome,
            route('produtos.show', $this)
        );
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
