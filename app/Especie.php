<?php

namespace App;

use App\Enums\EspecieTypeEnum;
use App\Enums\IucnRedListEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Plank\Mediable\Mediable;
use Spatie\Searchable\Searchable;

class Especie extends Model implements Searchable
{
    use EnumCastable;
    use Mediable;

    protected $casts = [
        'tipo' => EspecieTypeEnum::class,
        'extincao' => IucnRedListEnum::class
    ];

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    
    protected $midias = [
        'foto', 'video'
    ];

    public static $searchable = [
        'nome', 'nome_cientifico', 'descricao'
    ];

    public function getMidias()
    {
        return $this->midias;
    }

    public function getSearchResult(): \Spatie\Searchable\SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->nome,
            route('especies.show', $this)
        );
    }
    
    public function scopeDoTipo($query, $tipo)
    {
        return $query->where('tipo', 'like', $tipo);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
    
    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
