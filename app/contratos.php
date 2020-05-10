<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contratos extends Model
{
    public function imoveis()
    {
        return $this->belongsTo('App\Imoveis');
    }

    public function inquilinos()
    {
        return $this->belongsToMany('App\Inquilinos');
    }

    public function rendas()
    {
        return $this->hasMany('App\Rendas');
    }

}
