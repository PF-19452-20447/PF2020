<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;

class Renda extends Model
{

    use LoadDefaults;

    protected $fillable = [
        'id',
        'valorPagar',
        'dataPagamento',
        'metodoPagamento',
        'valorPago' ,
        'valorDivida' ,
        'estado',
        'dataLimitePagamento',
        'notas' ,
        'dataRecibo'
    ];


    public function contrato()
    {
        return $this->belongsTo('App\Contrato');
    }
}
