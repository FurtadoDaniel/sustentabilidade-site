<?php

namespace App;

use App\Enums\PostTypeEnum;
use App\Traits\Anexos;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;

class Post extends Model
{
    use Anexos;
    use EnumCastable;

    protected $casts = [
        'tipo' => PostTypeEnum::class
    ];
    protected $fillable = [
        'conteudo', 'tipo', 'titulo' 
    ];

    public function anexo()
    {
        return $this->morphOne(Anexo::class, 'anexavel');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
