<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use App\Cache;
use App\camel_case;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Inquilino extends Model implements HasMedia
{

    protected $table='inquilinos';

    use LoadDefaults, InteractsWithMedia;

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useFallbackUrl('/images/default_user.jpg')
            ->useFallbackPath(public_path('/images/default_user.jpg'));
    }


}
