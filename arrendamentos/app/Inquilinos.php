<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquilinos extends Model
{
    public function users()
    {
        return $this->belongsTo('App\Users', 'foreign_key');
    }

    public function fiadores()

    {
         return $this->hasMany('App\Fiadores');
     }

     public function contratos()
     {
         return $this->belongsToMany('App\Contratos');
     }




}
