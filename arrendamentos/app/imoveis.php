<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imoveis extends Model
{
    public function proprietarios()
    {
        return $this->belongsToMany('App\Proprietarios');
    }

    public function ficheiros()
    {
        return $this->belongsToMany('App\Ficheiros');
    }

    public function financas()
    {
        return $this->hasMany('App\Financas');
    }

    public function contratos()
    {
        return $this->hasMany('App\Contratos');
    }
}
