<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rendas extends Model
{
    public function contratos()
    {
        return $this->belongsTo('App\Contratos');
    }
}
