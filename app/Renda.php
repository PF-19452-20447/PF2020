<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;

class Renda extends Model
{

    use LoadDefaults;

    protected $table = 'rendas';

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

  public function inquil (){

        return $this->belongsTo('App\Inquilino');
    }

    public function proprieta()
    {
        return $this->belongsTo('App\Proprietario');
    }
}
