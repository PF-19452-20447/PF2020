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
    const TYPE_SIM = 4;
    const TYPE_NÃO = 5;

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
    public static function getStateArray()
    {
        return [
            self::TYPE_ARRENDADO =>  __('Arrendado'),
            self::TYPE_VAZIO =>  __('Vazio'),
            self::TYPE_MANUTENÇÃO =>  __('Manutenção')
        ];
    }

    public static function getBooleanArray()
    {
        return [
            self::TYPE_SIM =>  __('Sim'),
            self::TYPE_NÃO =>  __('Não'),
        ];
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
     * Return an array with the values of type field
     * @return array
     */
    public function getStateOptions()
    {
        return static::getStateArray();
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
