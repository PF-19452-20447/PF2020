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
    const CONTRATO_HABITACIONAL = 11;
    const CONTRATO_HABITACIONALNAO = 12;
    const CONTRATO_NAOHABITACIONAL = 13;
    const RETENCAO_SIM = 14;
    const RETENCAO_NÃO = 15;
    const RENDAS_0 = 16;
    const RENDAS_1 = 17;
    const RENDAS_2 = 18;
    const RENDAS_3 = 19;
    const RENDAS_4 = 20;
    const RENDAS_5 = 21;
    const RENDAS_6 = 22;
    const RENDAS_7 = 23;
    const RENDAS_8 = 24;
    const RENDAS_9 = 25;
    const RENDAS_10 = 26;
    const RENDAS_11 = 27;
    const RENDAS_12 = 28;


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
    public static function getRendasAvancoArray()
    {
        return [
            self::RENDAS_0 =>  __('0'),
            self::RENDAS_1 =>  __('1'),
            self::RENDAS_2 =>  __('2'),
            self::RENDAS_3 =>  __('3'),
            self::RENDAS_4 =>  __('4'),
            self::RENDAS_5 =>  __('5'),
            self::RENDAS_6 =>  __('6'),
            self::RENDAS_7 =>  __('7'),
            self::RENDAS_8 =>  __('8'),
            self::RENDAS_9 =>  __('9'),
            self::RENDAS_10 =>  __('10'),
            self::RENDAS_11 =>  __('11'),
            self::RENDAS_12 =>  __('12')

        ];
    }

      /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getRetencaoFonteArray()
    {
        return [
            self::RETENCAO_SIM =>  __('Yes'),
            self::RETENCAO_NÃO =>  __('No'),
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getTipoContratoArray()
    {
        return [
            self::CONTRATO_HABITACIONAL =>  __('Permanent Housing'),
            self::CONTRATO_HABITACIONALNAO =>  __('Non-permanent Housing'),
            self::CONTRATO_NAOHABITACIONAL => __('Non-Housing')
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
    public function getRendasAvancoOptions()
    {
        return static::getRendasAvancoArray();
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
     * Return an array with the values of type field
     * @return array
     */
    public function getRetencaoFonteOptions()
    {
        return static::getRetencaoFonteArray();
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
    public function getRendasAvancoLabelAttribute()
    {
        $array = self::getRendasAvancoOptions();
        return $array[$this->rendasAvanco];
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
    public function getRetencaoFonteLabelAttribute()
    {
        $array = self::getRetencaoFonteOptions();
        return $array[$this->retencaoFonte];
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

    public function fiadores()
    {
        return $this->belongsToMany('App\Fiador', 'contrato_fiadores');
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
