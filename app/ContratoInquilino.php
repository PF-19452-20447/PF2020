<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;

class ContratoInquilino extends Model
{

    use LoadDefaults;


    protected $fillable = [
        'inquilino_id',
        'contrato_id'
    ];

}
