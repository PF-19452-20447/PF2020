<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financas extends Model
{
    public function imovel()
    {
        return $this->belongsTo('App\Imovel');
    }
}
