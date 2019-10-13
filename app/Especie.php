<?php

namespace App;

use App\Enums\EspecieTypeEnum;
use App\Enums\IucnRedListEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Especie extends Model implements HasMedia
{
    use EnumCastable;
    use HasMediaTrait;

    protected $casts = [
        'tipo' => EspecieTypeEnum::class,
        'extincao' => IucnRedListEnum::class
    ];
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    
    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }
    
    public function users()
    {
        return $this->hasMany(User::class, ['animal_id', 'arvore_id'], 'id');
    }
}
