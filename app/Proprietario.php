<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LoadDefaults;
use App\Collection;
use Cache;

class Proprietario extends Model
{
    const CAE_PRINCIPAL = 1;
    const CAE_SECUNDÁRIO = 2;
    const TYPE_EMPRESA = 3;
    const TYPE_PARTICULAR = 4;
    const SETOR_PRIMARIO = 5;
    const SETOR_SECUNDARIO = 6;
    const SETOR_TERCIARIO = 7;


    //protected $table= 'proprietarios';

    use LoadDefaults;

    protected $guarded=['id'];

    protected $fillable = [
        'id',
        'nome',
        'dataNascimento',
        'nif',
        'cc',
        'email',
        'telefone',
        'morada',
        'iban',
        'tipoParticularEmpresa',
        'cae',
        'setorActividade',
        'certidaoPermanente',
        'numFuncionarios',
        'user_id'
    ];


     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('proprietario-params');
            Cache::forget('proprietario-options');
        });
    }

  /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getCAEArray()
    {
        return [
            self::CAE_PRINCIPAL =>  __('Main'),
            self::CAE_SECUNDÁRIO =>  __('Secondary'),
        ];
    }



    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getSetorAtividadeArray()
    {
        return [
            self::SETOR_PRIMARIO =>  __('Primary'),
            self::SETOR_SECUNDARIO =>  __('Secondary'),
            self::SETOR_TERCIARIO =>  __('Third'),
        ];
    }


    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getTipoParticularEmpresaArray()
    {
        return [
            self::TYPE_EMPRESA =>  __('Company'),
            self::TYPE_PARTICULAR =>  __('Private')
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
    public function getSetorAtividadeOptions()
    {
        return static::getSetorAtividadeArray();
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
    public function getSetorAtividadeLabelAttribute()
    {
        $array = self::getSetorAtividadeOptions();
        return $array[$this->setorActividade];
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

    public function inquilinos()
    {
        return $this->belongsToMany('App\Inquilino', 'proprietario_inquilino');
    }

    public function rendas() {

        return $this->hasMany('App\Renda');

    }

    public function imoveis(){

        return $this->belongsToMany('App\Imovel', 'proprietarios_imoveis');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function fiadores(){
        return $this->hasMany('App\Fiador');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($proprietario) { // before delete() method call this
             $proprietario->rendas()->each(function($rendas) {
                $rendas->delete(); // <-- direct deletion
             });
             $proprietario->inquilinos()->each(function($inquilinos) {
                $inquilinos->delete(); // <-- direct deletion
             });
             $proprietario->imoveis()->each(function($imoveis) {
                $imoveis->delete(); // <-- direct deletion
             });
        });
    }
}
