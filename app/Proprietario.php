<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;

class Proprietario extends Model
{
    use LoadDefaults;

    protected $fillable = [
        'id',
        'nome',
        'dataNascimento',
        'nif',
        'cc',
        'email',
        'telefone',
        'morada',
        'iban',
        'tipoParticularEmpresa',
        'cae',
        'capitalSocial',
        'setorActividade',
        'certidaoPermanente',
        'numFuncionarios'
    ];

    public function inquilinos()
    {
        return $this->belongsToMany('App\Inquilino', 'proprietario_inquilino');
    }

    public function rendas() {

        return $this->hasMany('App\Renda');

    }

    public function imoveis (){

        return $this->belongsToMany('App\Imovel', 'proprietarios_imoveis');
    }



}
