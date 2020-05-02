<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiadores extends Model
{
    public function inquilinos()
    {
        return $this->belongsTo('App\Inquilinos', 'foreign_key');
    }
}
