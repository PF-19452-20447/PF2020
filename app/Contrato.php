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
    const DIA_1 = 29;
    const DIA_2 = 30;
    const DIA_3 = 31;
    const DIA_4 = 32;
    const DIA_5 = 33;
    const DIA_6 = 34;
    const DIA_7 = 35;
    const DIA_8 = 36;
    const DIA_9 = 37;
    const DIA_10 = 38;
    const DIA_11 = 39;
    const DIA_12 = 40;
    const DIA_13 = 41;
    const DIA_14 = 42;
    const DIA_15 = 43;
    const DIA_16 = 44;
    const DIA_17 = 45;
    const DIA_18 = 46;
    const DIA_19 = 47;
    const DIA_20 = 48;
    const DIA_21 = 49;
    const DIA_22 = 50;
    const DIA_23 = 51;
    const DIA_24 = 52;
    const DIA_25 = 53;
    const DIA_26 = 54;
    const DIA_27 = 55;
    const DIA_28 = 56;
    const DIA_29 = 57;
    const DIA_30 = 58;
    const DIA_31 = 59;



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
        'diaLimitePagamento' ,
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
    public static function getDiaLimitePagamentoArray()
    {
        return [
            self::DIA_1 =>  __('1'),
            self::DIA_2 =>  __('2'),
            self::DIA_3 =>  __('3'),
            self::DIA_4 =>  __('4'),
            self::DIA_5 =>  __('5'),
            self::DIA_6 =>  __('6'),
            self::DIA_7 =>  __('7'),
            self::DIA_8 =>  __('8'),
            self::DIA_9 =>  __('9'),
            self::DIA_10 =>  __('10'),
            self::DIA_11 =>  __('11'),
            self::DIA_12 =>  __('12'),
            self::DIA_13 =>  __('13'),
            self::DIA_14 =>  __('14'),
            self::DIA_15 =>  __('15'),
            self::DIA_16 =>  __('16'),
            self::DIA_17 =>  __('17'),
            self::DIA_18 =>  __('18'),
            self::DIA_19 =>  __('19'),
            self::DIA_20 =>  __('20'),
            self::DIA_21 =>  __('21'),
            self::DIA_22 =>  __('22'),
            self::DIA_23 =>  __('23'),
            self::DIA_24 =>  __('24'),
            self::DIA_25 =>  __('25'),
            self::DIA_26 =>  __('26'),
            self::DIA_27 =>  __('27'),
            self::DIA_28 =>  __('28'),
            self::DIA_29 =>  __('29'),
            self::DIA_30 =>  __('30'),
            self::DIA_31 =>  __('31')

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
    public function getDiaLimitePagamentoOptions()
    {
        return static::getDiaLimitePagamentoArray();
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
    public function getDiaLimitePagamentoLabelAttribute()
    {
        $array = self::getDiaLimitePagamentoOptions();
        return $array[$this->diaLimitePagamento];
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
