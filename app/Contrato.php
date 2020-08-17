<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use Cache;

class Contrato extends Model
{

    const TYPE_EM_ESPERA = 1;
    const TYPE_PAGO = 2;
    const TYPE_NAO_REMUNERADO = 3;
    const TYPE_PARCIAL = 4;
    const TYPE_SIM = 5;
    const TYPE_NÃO = 6;
    const TYPE_TRANSFERENCIA_BANCARIA = 7;
    const TYPE_MULTIBANCO = 8;
    const TYPE_MBWAY = 9;
    const TYPE_DEBITO_DIRETO = 10;
    const TYPE_CARTAO_CREDITO = 11;

  //  protected $table = 'contratos';
    //protected $primaryKey = 'contrato_id';

    use LoadDefaults;

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
            self::TYPE_EM_ESPERA =>  __('Em Espera'),
            self::TYPE_PAGO =>  __('Pago'),
            self::TYPE_NAO_REMUNERADO =>  __('Não Remunerado'),
            self::TYPE_PARCIAL =>  __('Parcial')
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getRenewableArray()
    {
        return [
            self::TYPE_SIM =>  __('Sim'),
            self::TYPE_NÃO =>  __('Não'),
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getMethodPaymentArray()
    {
        return [
            self::TYPE_TRANSFERENCIA_BANCARIA =>  __('Transferência Bancária'),
            self::TYPE_MULTIBANCO =>  __('Multibanco'),
            self::TYPE_MBWAY =>  __('Mb Way'),
            self::TYPE_DEBITO_DIRETO =>  __('Débito Direto'),
            self::TYPE_CARTAO_CREDITO =>  __('Cartão de Crédito')
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
    public function getRenewableOptions()
    {
        return static::getRenewableArray();
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
    public function getStateLabelAttribute()
    {
        $array = self::getStateOptions();
        return $array[$this->estado];
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

}
