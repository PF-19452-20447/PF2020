<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficheiro extends Model
{
    public function imovel()
    {
        return $this->belongsToMany('App\Imovel');
    }
}
