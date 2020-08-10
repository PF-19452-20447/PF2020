<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Cache;


class Imovel extends Model implements HasMedia
{

    const TYPE_ARRENDADO = 1;
    const TYPE_VAZIO = 2;
    const TYPE_MANUTENÇÃO = 3;

    protected $table = "imoveis";
    //protected $primaryKey = 'contrato_id';
    use LoadDefaults, InteractsWithMedia;

    protected $guarded=['id'];

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

     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('renda-params');
            Cache::forget('renda-options');
        });
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getStateArray()
    {
        return [
            self::TYPE_ARRENDADO =>  __('Arrendado'),
            self::TYPE_VAZIO =>  __('Vazio'),
            self::TYPE_MANUTENÇÃO =>  __('Manutenção')
        ];
    }

     /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getStateLabelAttribute()
    {
        $array = self::getStateOptions();
        return $array[$this->estado];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public function getStateOptions()
    {
        return static::getStateArray();
    }


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
