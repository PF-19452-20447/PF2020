<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProprietarioInquilino extends Model
{

    protected $fillable = [
        'inquilino_id',
        'proprietario_id'
    ];
}
