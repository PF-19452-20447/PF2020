<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Cache;


class Imovel extends Model implements HasMedia
{

    const ESTADO_ARRENDADO = 1;
    const ESTADO_VAZIO = 2;
    const ESTADO_MANUTENÇÃO = 3;
    const BOOLEAN_SIM = 4;
    const BOOLEAN_NÃO = 5;
    const TYPE_APARTAMENTO = 6;
    const TYPE_MORADIA = 7;
    const TIPOLOGIA_T1 = 8;
    const TIPOLOGIA_T2 = 9;
    const TIPOLOGIA_T3 = 10;
    const TIPOLOGIA_T4 = 11;
    const TIPOLOGIA_T5 = 12;

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
            Cache::forget('imovel-params');
            Cache::forget('imovel-options');
        });
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getTypologyArray()
    {
        return [
            self::TIPOLOGIA_T1 =>  __('T1'),
            self::TIPOLOGIA_T2 =>  __('T2'),
            self::TIPOLOGIA_T3 =>  __('T3'),
            self::TIPOLOGIA_T4 =>  __('T4'),
            self::TIPOLOGIA_T5 =>  __('T5')
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getStateArray()
    {
        return [
            self::ESTADO_ARRENDADO =>  __('Leased'),
            self::ESTADO_VAZIO =>  __('Empty'),
            self::ESTADO_MANUTENÇÃO =>  __('Maintenance')
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getTypeArray()
    {
        return [
            self::TYPE_APARTAMENTO =>  __('Apartment'),
            self::TYPE_MORADIA =>  __('House')
        ];
    }


    public static function getBooleanArray()
    {
        return [
            self::BOOLEAN_SIM =>  __('Yes'),
            self::BOOLEAN_NÃO =>  __('No'),
        ];
    }

     /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getTipologiaLabelAttribute()
    {
        $array = self::getTypologyOptions();
        return $array[$this->tipologia];
    }

     /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getEstadoLabelAttribute()
    {
        $array = self::getStateOptions();
        return $array[$this->estado];
    }

        /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getTipoLabelAttribute()
    {
        $array = self::getTypeOptions();
        return $array[$this->tipo];
    }

     /**
     * Return an array with the values of type field
     * @return array
     */
    public function getStateOptions()
    {
        return static::getStateArray();
    }


    /**
     * Return an array with the values of type field
     * @return array
     */
    public function getTypeOptions()
    {
        return static::getTypeArray();
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getBooleanLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->mobilado];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getAnimaisEstimacaoLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->animaisEstimacao];
    }


    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getTelevisaoLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->televisao];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getFrigorificoLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->frigorifico];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getPiscinaLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->piscina];
    }

     /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getVarandaLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->varanda];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getTerracoLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->terraco];
    }

     /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getChurrasqueiraLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->churrasqueira];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getArCondicionadoLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->arCondicionado];
    }


    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getFumarLabelAttribute()
    {
        $array = self::getBooleanOptions();
        return $array[$this->fumar];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public function getBooleanOptions()
    {
        return static::getBooleanArray();
    }

      /**
     * Return an array with the values of type field
     * @return array
     */
    public function getTypologyOptions()
    {
        return static::getTypologyArray();
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

    public function inquilino(){
        return $this->belongsTo('App\Inquilino');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useFallbackUrl('/images/default_user.jpg')
            ->useFallbackPath(public_path('/images/default_user.jpg'));
    }

}
