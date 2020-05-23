<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiador extends Model
{
    public function inquilino()
    {
        return $this->belongsTo('App\Inquilino', 'foreign_key');
    }
}
