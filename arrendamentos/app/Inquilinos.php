<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquilinos extends Model
{
    public function users()
    {
        return $this->belongsTo('App\Users', 'foreign_key');
    }
}
