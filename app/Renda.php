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
