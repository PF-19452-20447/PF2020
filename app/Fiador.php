<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;

class Fiador extends Model
{

    protected $table = "fiadores";
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
        'cae' ,
        'capitalSocial' ,
        'setorActividade' ,
        'certidaoPermanente',
        'numFuncionarios'
    ];


    public function proprietarios()
    {
        return $this->belongsTo('App\Inquilino', 'foreign_key');
    }
}
