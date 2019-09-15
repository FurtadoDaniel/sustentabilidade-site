<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    public function anexavel()
    {
        return $this->morphTo();
    }
}
