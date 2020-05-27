<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    public function proprietario()
    {
        return $this->belongsToMany('App\Proprietario');
    }

    public function ficheiro()
    {
        return $this->belongsToMany('App\Ficheiro');
    }

    public function financas()
    {
        return $this->hasMany('App\Financas');
    }

    public function contrato()
    {
        return $this->hasMany('App\Contrato');
    }
}
