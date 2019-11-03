<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assinaturas extends Model
{
    protected $fillable = ['user_id','abaixo_id'];
    protected $guarded = ['id'];
    protected $table = 'assinaturas';
}
