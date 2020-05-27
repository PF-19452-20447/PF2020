<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key');
    }

    public function fiador()

    {
         return $this->hasMany('App\Fiador');
     }

     public function contrato()
     {
         return $this->belongsToMany('App\Contrato');
     }




}
