<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renda extends Model
{
    public function contrato()
    {
        return $this->belongsTo('App\Contrato');
    }
}
