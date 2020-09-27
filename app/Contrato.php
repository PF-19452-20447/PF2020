<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use Cache;
use File;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Contrato extends Model implements HasMedia
{

    const ESTADO_ATIVO = 1;
    const ESTADO_PENDENTE = 2;
    const ESTADO_TERMINADO = 3;
    const PAGAMENTO_TRANSFERENCIA_BANCARIA = 4;
    const PAGAMENTO_MULTIBANCO = 5;
    const PAGAMENTO_MBWAY = 6;
    const PAGAMENTO_DEBITO_DIRETO = 7;
    const PAGAMENTO_CARTAO_CREDITO = 8;
    const RENOVAVEL_SIM = 9;
    const RENOVAVEL_NÃO = 10;
    const CONTRATO_ANUAL = 11;
    const CONTRATO_SEMESTRAL = 12;
    const CONTRATO_MENSAL = 13;


  //  protected $table = 'contratos';
    //protected $primaryKey = 'contrato_id';

    use LoadDefaults, InteractsWithMedia;

    protected $guarded=['id'];

    protected $table = 'contratos';


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
        'rendasAvanco',
        'imovel_id'
    ];


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('contrato-params');
            Cache::forget('contrato-options');
        });
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getStateArray()
    {
        return [
            self::ESTADO_ATIVO =>  __('Active'),
            self::ESTADO_PENDENTE =>  __('Pending'),
            self::ESTADO_TERMINADO =>  __('Ended'),
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
    public static function getMethodPaymentArray()
    {
        return [
            self::PAGAMENTO_TRANSFERENCIA_BANCARIA =>  __('Bank Transfer'),
            self::PAGAMENTO_MULTIBANCO =>  __('ATM'),
            self::PAGAMENTO_MBWAY =>  __('Mb Way'),
            self::PAGAMENTO_DEBITO_DIRETO =>  __('Direct Debt'),
            self::PAGAMENTO_CARTAO_CREDITO =>  __('Credit Card')
        ];
    }

      /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getRenewableArray()
    {
        return [
            self::RENOVAVEL_SIM =>  __('Yes'),
            self::RENOVAVEL_NÃO =>  __('No'),
        ];
    }


     /**
     * Return an array with the values of type field
     * @return array
     */
    public function getMethodPaymentOptions()
    {
        return static::getMethodPaymentArray();
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
    public function getStateOptions()
    {
        return static::getStateArray();
    }


    /**
     * Return an array with the values of type field
     * @return array
     */
    public function getRenewableOptions()
    {
        return static::getRenewableArray();
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
    public function getRenewableLabelAttribute()
    {
        $array = self::getRenewableOptions();
        return $array[$this->renovavel];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getMethodPaymentLabelAttribute()
    {
        $array = self::getMethodPaymentOptions();
        return $array[$this->metodoPagamento];
    }



    public function imovel()
    {
        return $this->belongsTo('App\Imovel');
    }

    public function inquilinos()
    {
        return $this->belongsToMany('App\Inquilino', 'contrato_inquilinos');
    }

    public function rendas()
    {
        return $this->hasMany('App\Renda');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('contract_files');
    }

}
