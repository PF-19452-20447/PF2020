<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use App\camel_case;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Cache;

class Inquilino extends Model implements HasMedia
{

    const CAE_PRINCIPAL = 1;
    const CAE_SECUNDÁRIO = 2;
    const TYPE_EMPRESA = 3;
    const TYPE_PARTICULAR = 4;
    const SETOR_PRIMARIO = 5;
    const SETOR_SECUNDARIO = 6;
    const SETOR_TERCIARIO = 7;
    const CONTRATO_ANUAL = 8;
    const CONTRATO_SEMESTRAL = 9;
    const CONTRATO_MENSAL = 10;

    protected $table='inquilinos';

    use LoadDefaults, InteractsWithMedia;

    protected $guarded=['id'];

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
        'tipoContrato' ,
        'notas',
        'cae' ,
        'setorActividade' ,
        'certidaoPermanente',
        'numFuncionarios',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('inquilino-params');
            Cache::forget('inquilino-options');
        });
    }

  /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getCAEArray()
    {
        return [
            self::CAE_PRINCIPAL =>  __('Principal'),
            self::CAE_SECUNDÁRIO =>  __('Secundário'),
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getTipoContratoArray()
    {
        return [
            self::CONTRATO_ANUAL =>  __('Yearly'),
            self::CONTRATO_SEMESTRAL =>  __('Six Month'),
            self::CONTRATO_MENSAL => __('Monthly')
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getSetorAtividadeArray()
    {
        return [
            self::SETOR_PRIMARIO =>  __('Primary'),
            self::SETOR_SECUNDARIO =>  __('Secondary'),
            self::SETOR_TERCIARIO =>  __('Third'),
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getTipoParticularEmpresaArray()
    {
        return [
            self::TYPE_EMPRESA =>  __('Empresa'),
            self::TYPE_PARTICULAR =>  __('Particular')
        ];
    }

     /**
     * Return an array with the values of type field
     * @return array
     */
    public function getCAEOptions()
    {
        return static::getCAEArray();
    }

     /**
     * Return an array with the values of type field
     * @return array
     */
    public function getTipoContratoOptions()
    {
        return static::getTipoContratoArray();
    }


      /**
     * Return an array with the values of type field
     * @return array
     */
    public function getSetorAtividadeOptions()
    {
        return static::getSetorAtividadeArray();
    }


     /**
     * Return an array with the values of type field
     * @return array
     */
    public function getTipoParticularEmpresaOptions()
    {
        return static::getTipoParticularEmpresaArray();
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getCAELabelAttribute()
    {
        $array = self::getCAEOptions();
        return $array[$this->cae];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getTipoContratoLabelAttribute()
    {
        $array = self::getTipoContratoOptions();
        return $array[$this->tipoContrato];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getSetorAtividadeLabelAttribute()
    {
        $array = self::getSetorAtividadeOptions();
        return $array[$this->setorActividade];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getTipoParticularEmpresaLabelAttribute()
    {
        $array = self::getTipoParticularEmpresaOptions();
        return $array[$this->tipoParticularEmpresa];
    }


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

    public function imoveis(){
        return $this->hasMany('App\Imovel');
    }



    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useFallbackUrl('/images/default_user.jpg')
            ->useFallbackPath(public_path('/images/default_user.jpg'));
    }


}
