<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;

class Imovel extends Model
{
    protected $table = "imoveis";
    use LoadDefaults;

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
        return $this->belongsToMany('App\Ficheiro');
    }

    public function financas()
    {
        return $this->hasMany('App\Financa');
    }

    public function contrato()
    {
        return $this->hasMany('App\Contrato');
    }
}
