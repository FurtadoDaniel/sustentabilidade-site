<?php

namespace App;

use App\Enums\EspecieTypeEnum;
use App\Enums\IucnRedListEnum;
use App\Traits\Anexos;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Especie extends Model
{
    use Anexos;
    use EnumCastable;
    use HasMediaTrait;

    protected $casts = [
        'tipo' => EspecieTypeEnum::class,
        'extincao' => IucnRedListEnum::class
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
