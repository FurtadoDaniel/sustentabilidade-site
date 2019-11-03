<?php

namespace App;

use App\Enums\EspecieTypeEnum;
use App\Enums\IucnRedListEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
class Especie extends Model
{
    use EnumCastable;

    protected $casts = [
        'tipo' => EspecieTypeEnum::class,
        'extincao' => IucnRedListEnum::class
    ];
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    
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
