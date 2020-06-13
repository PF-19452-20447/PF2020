<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;

class ProprietarioInquilino extends Model
{


    use LoadDefaults;


    protected $fillable = [
        'inquilino_id',
        'proprietario_id'
    ];
}
