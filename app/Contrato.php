<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    public function imovel()
    {
        return $this->belongsTo('App\Imovel');
    }

    public function inquilino()
    {
        return $this->belongsToMany('App\Inquilino');
    }

    public function renda()
    {
        return $this->hasMany('App\Renda');
    }

}
