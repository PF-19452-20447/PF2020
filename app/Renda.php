<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use Cache;

class Renda extends Model
{
    //VER O CAMPO DO TYPE ALTERAR PARA ESTADO_EM_ESPERA.
    const ESTADO_EM_ESPERA = 1;
    const ESTADO_PAGO = 2;
    const ESTADO_NAO_REMUNERADO = 3;
    const ESTADO_PARCIAL = 4;
    const PAGAMENTO_TRANSFERENCIA_BANCARIA = 5;
    const PAGAMENTO_MULTIBANCO = 6;
    const PAGAMENTO_MBWAY = 7;
    const PAGAMENTO_DEBITO_DIRETO = 8;
    const PAGAMENTO_CARTAO_CREDITO = 9;

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
        'dataRecibo',
        'entidade',
        'referencia',
        'contrato_id',
        'inquilino_id',
        'proprietario_id'
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
            self::ESTADO_EM_ESPERA =>  __('Em Espera'),
            self::ESTADO_PAGO =>  __('Pago'),
            self::ESTADO_NAO_REMUNERADO =>  __('Não Remunerado'),
            self::ESTADO_PARCIAL =>  __('Parcial')
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getMethodPaymentArray()
    {
        return [
            self::PAGAMENTO_TRANSFERENCIA_BANCARIA =>  __('Transferência Bancária'),
            self::PAGAMENTO_MULTIBANCO =>  __('Multibanco'),
            self::PAGAMENTO_MBWAY =>  __('Mb Way'),
            self::PAGAMENTO_DEBITO_DIRETO =>  __('Débito Direto'),
            self::PAGAMENTO_CARTAO_CREDITO =>  __('Cartão de Crédito')
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
