<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use App\Cache;
use Illuminate\Auth\Access\HandlesAuthorization;

class Inquilino extends Model
{

    use LoadDefaults;

    protected $fillable = [
        'id',
        'nome',
        'dataNascimento',
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

    public function fiadores()
    {
        return $this->hasMany('App\Fiador');
    }

    public function proprietarios()
    {
        return $this->belongsToMany('App\Proprietario', 'proprietario_inquilino');
    }

    public function contratos (){

        return $this->belongsToMany('App\Contrato', 'contrato_inquilinos');
    }

    public function rendas(){

        return $this->hasMany('App\Renda'); /*, 'inquilino_id', 'id');*/
    }

}
