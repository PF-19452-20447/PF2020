<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use Cache;

class Fiador extends Model
{
    const TYPE_PRINCIPAL = 1;
    const TYPE_SECUNDÁRIO = 2;
    const TYPE_EMPRESA = 3;
    const TYPE_PARTICULAR = 4;

    protected $table = "fiadores";

    use LoadDefaults;

    protected $guarded=['id'];


    protected $hidden = [
        'action'
    ];

    protected $fillable = [
        'id',
        'nome',
        'dataNascimento',
        'nif',
        'cc' ,
        'email' ,
        'telefone',
        'morada',
        'iban' ,
        'tipoParticularEmpresa',
        'cae' ,
        'capitalSocial' ,
        'setorActividade' ,
        'certidaoPermanente',
        'numFuncionarios'
    ];

     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('inquilino-params');
            Cache::forget('inquilino-options');
        });
    }

  /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getCAEArray()
    {
        return [
            self::TYPE_PRINCIPAL =>  __('Principal'),
            self::TYPE_SECUNDÁRIO =>  __('Secundário'),
        ];
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getTipoParticularEmpresaArray()
    {
        return [
            self::TYPE_EMPRESA =>  __('Empresa'),
            self::TYPE_PARTICULAR =>  __('Particular')
        ];
    }

     /**
     * Return an array with the values of type field
     * @return array
     */
    public function getCAEOptions()
    {
        return static::getCAEArray();
    }

     /**
     * Return an array with the values of type field
     * @return array
     */
    public function getTipoParticularEmpresaOptions()
    {
        return static::getTipoParticularEmpresaArray();
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getCAELabelAttribute()
    {
        $array = self::getCAEOptions();
        return $array[$this->cae];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getTipoParticularEmpresaLabelAttribute()
    {
        $array = self::getTipoParticularEmpresaOptions();
        return $array[$this->tipoParticularEmpresa];
    }



    public function proprietarios()
    {
        return $this->belongsTo('App\Inquilino', 'foreign_key');
    }

    public function inquilino () {
        return $this->hasOne('App\Inquilino');
    }




}
