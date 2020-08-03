<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use File;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Contrato extends Model implements HasMedia
{

    use LoadDefaults, InteractsWithMedia;

    protected $fillable = [
        'id',
        'valorRenda',
        'tipoContrato',
        'inicioContrato',
        'fimContrato' ,
        'renovavel' ,
        'isencaoBeneficio',
        'retencaoFonte',
        'dataLimitePagamento' ,
        'estado',
        'encargos',
        'caucao',
        'metodoPagamento',
        'rendasAvanco'
    ];


    public function imovel()
    {
        return $this->belongsTo('App\Imovel');
    }

    public function inquilino()
    {
        return $this->belongsToMany('App\Inquilino', 'contrato_inquilinos');
    }

    public function renda()
    {
        return $this->hasMany('App\Renda');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('contract_files');
    }

}
