<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    protected $fillable = [

        'nome',
        'dataNascimento',
        'idade',
        'nif',
        'cc' ,
        'email' ,
        'telefone',
        'morada',
        'iban' ,
        'tipoParticularEmpresa',
        'profissao',
        'vencimento',
        'tipoContrato' ,
        'notas',
        'cae' ,
        'capitalSocial' ,
        'setorActividade' ,
        'certidaoPermanente',
        'numFuncionarios'

    ];

}
