<?php

namespace App;

use App\Enums\PostTypeEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Plank\Mediable\Mediable;

class Post extends Model
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
