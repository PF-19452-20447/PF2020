<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;

class Proprietario extends Model
{
    use LoadDefaults;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'idade',
        'NIF',
        'CC',
        'email',
        'telefone',
        'morada',
        'IBAN',
        'tipo_particular_empresa',
        'cae',
        'capital_social',
        'setor_actividade',
        'certidao_permanente',
        'num_funcionarios'
    ];
}
