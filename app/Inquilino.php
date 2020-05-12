<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    protected $fillable = [

        'nome',
        'data_nascimento',
        'idade',
        'NIF',
        'CC' ,
        'email' ,
        'telefone',
        'morada',
        'IBAN' ,
        'tipo_particular_empresa',
        'profissao',
        'vencimento',
        'tipo_contrato' ,
        'notas',
        'cae' ,
        'capital_social' ,
        'setor_actividade' ,
        'certidao_permanente',
        'num_funcionarios'

    ];

}
