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

    public function getMidias()
    {
        return $this->midias;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
