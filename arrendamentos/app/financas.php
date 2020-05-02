<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class financas extends Model
{
    public function imoveis()
    {
        return $this->belongsTo('App\Imoveis');
    }
}
