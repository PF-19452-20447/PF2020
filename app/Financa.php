<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financa extends Model
{
    public function imovel()
    {
        return $this->belongsTo('App\Imovel');
    }
}
