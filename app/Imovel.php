<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;


class Imovel extends Model implements HasMedia
{
    protected $table = "imoveis";
    use LoadDefaults, InteractsWithMedia;

    protected $fillable = [
        'id',
        'tipo',
        'tipologia',
        'area',
        'morada',
        'numQuartos',
        'numCasaBanho',
        'descricao',
        'estado' ,
        'mobilado',
        'fumar',
        'animaisEstimacao',
        'outrosEquipamentos',
        'certificadoEnergetico',
        'licencaHabitacao',
        'notas',
        'televisao',
        'frigorifico',
        'piscina',
        'varanda',
        'terraco',
        'churrasqueira',
        'arCondicionado'
    ];


    public function proprietarios()
    {
        return $this->belongsToMany('App\Proprietario', 'proprietarios_imoveis');
    }

    public function ficheiro()
    {
        return $this->hasMany('App\Ficheiro');
    }

    public function financas()
    {
        return $this->hasMany('App\Financa');
    }

    public function contrato()
    {
        return $this->hasMany('App\Contrato');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useFallbackUrl('/images/default_user.jpg')
            ->useFallbackPath(public_path('/images/default_user.jpg'));
    }

}
