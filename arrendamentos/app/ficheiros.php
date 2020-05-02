<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ficheiros extends Model
{
    public function imoveis()
    {
        return $this->belongsToMany('App\Imoveis');
    }
}
