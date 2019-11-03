<?php

namespace App;

use App\Enums\EspecieTypeEnum;
use App\Enums\IucnRedListEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Plank\Mediable\Mediable;

class Especie extends Model
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

    public function getMidias()
    {
        return $this->midias;
    }
    
    public function scopeDoTipo($query, $tipo)
    {
        return $query->where('tipo', 'like', $tipo);
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
