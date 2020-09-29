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
    const TYPE_LOJAS = 8;
    const TYPE_PREDIOS = 9;
    const TIPOLOGIA_T0 = 10;
    const TIPOLOGIA_T1 = 11;
    const TIPOLOGIA_T2 = 12;
    const TIPOLOGIA_T3 = 13;
    const TIPOLOGIA_T4 = 14;
    const TIPOLOGIA_T5 = 15;
    const TIPOLOGIA_T6 = 16;
    const TIPOLOGIA_T7 = 17;
    const TIPOLOGIA_T8 = 18;
    const TIPOLOGIA_T9 = 19;
    const TIPOLOGIA_T10 = 20;
    const CERTIFICADO_AA = 21;
    const CERTIFICADO_A = 22;
    const CERTIFICADO_B = 23;
    const CERTIFICADO_BB = 24;
    const CERTIFICADO_C = 25;
    const CERTIFICADO_D = 26;
    const CERTIFICADO_E = 27;
    const CERTIFICADO_F = 28;
    const CERTIFICADO_G = 29;
    const CERTIFICADO_ISENTO = 30;
    const CERTIFICADO_NA = 31;


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
            self::TIPOLOGIA_T0 =>  __('T0'),
            self::TIPOLOGIA_T1 =>  __('T1'),
            self::TIPOLOGIA_T2 =>  __('T2'),
            self::TIPOLOGIA_T3 =>  __('T3'),
            self::TIPOLOGIA_T4 =>  __('T4'),
            self::TIPOLOGIA_T5 =>  __('T5'),
            self::TIPOLOGIA_T6 =>  __('T6'),
            self::TIPOLOGIA_T7 =>  __('T7'),
            self::TIPOLOGIA_T8 =>  __('T8'),
            self::TIPOLOGIA_T9 =>  __('T9'),
            self::TIPOLOGIA_T10 =>  __('T10 or higher')
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
            self::TYPE_MORADIA =>  __('House'),
            self::TYPE_LOJAS => __('Shop'),
            self::TYPE_PREDIOS => __('Buildings')
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
     * Return an array with the values of type field
     * @return array
     */
    public static function getCertificadoEnergeticoArray()
    {
        return [
            self::CERTIFICADO_AA => __('A+'),
            self::CERTIFICADO_A => __('A'),
            self::CERTIFICADO_B => __('B'),
            self::CERTIFICADO_BB => __('B-'),
            self::CERTIFICADO_C => __('C'),
            self::CERTIFICADO_D => __('D'),
            self::CERTIFICADO_E => __('E'),
            self::CERTIFICADO_F => __('F'),
            self::CERTIFICADO_G => __('G'),
            self::CERTIFICADO_ISENTO => __('Isento'),
            self::CERTIFICADO_NA => __('N/A')
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
    public function getCertificadoEnergeticoLabelAttribute()
    {
        $array = self::getCertificadoEnergeticoOptions();
        return $array[$this->certificadoEnergetico];
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
    public function getCertificadoEnergeticoOptions()
    {
        return static::getCertificadoEnergeticoArray();
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
