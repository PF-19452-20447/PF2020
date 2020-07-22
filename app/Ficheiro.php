<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;

class Ficheiro extends Model
{
    protected $table = "ficheiros";
    use LoadDefaults;

    protected $fillable = [
        'id',
        'foto',
        'descricao',
        'imovel_id'
    ];

    public function imoveis()
    {
        return $this->belongsTo('App\Imovel');
    }
}
