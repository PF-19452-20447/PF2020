<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProprietarioImovel extends Model
{
    protected $table = 'proprietarios_imoveis';

    protected $fillable = [
        'proprietario_id',
        'imovel_id'
    ];
}
