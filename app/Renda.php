<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use Cache;

class Renda extends Model
{
    const TYPE_EM_ESPERA = 1;
    const TYPE_PAGO = 2;
    const TYPE_NAO_REMUNERADO = 3;
    const TYPE_PARCIAL = 4;
    const TYPE_TRANSFERENCIA_BANCARIA = 5;
    const TYPE_MULTIBANCO = 6;
    const TYPE_MBWAY = 7;
    const TYPE_DEBITO_DIRETO = 8;
    const TYPE_CARTAO_CREDITO = 9;

    use LoadDefaults;

    protected $guarded=['id'];

    protected $table = 'rendas';

    protected $fillable = [
        'id',
        'valorPagar',
        'dataPagamento',
        'metodoPagamento',
        'valorPago',
        'valorDivida',
        'estado',
        'dataLimitePagamento',
        'notas',
        'dataRecibo'
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
    public function getStateOptions()
    {
        return static::getStateArray();
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
    public function getMethodPaymentLabelAttribute()
    {
        $array = self::getMethodPaymentOptions();
        return $array[$this->metodoPagamento];
    }



    public function contrato()
    {
        return $this->belongsTo('App\Contrato');
    }

  public function inquilino (){

        return $this->belongsTo('App\Inquilino');
    }

    public function proprietario()
    {
        return $this->belongsTo('App\Proprietario');
    }
}
