<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proprietarios extends Model
{
    public function users()
    {
        return $this->belongsTo('App\Users', 'foreign_key');
    }
}
