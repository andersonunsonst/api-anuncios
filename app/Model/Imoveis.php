<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;


class Imoveis
{

    public $table = 'sf_anuncio';
    
    public $timestamps = false;
    
    protected $connection= 'sellf';

    public $fillable = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    public static function getImoveisZapSellf(){
        return DB::select("SELECT * FROM sellfcom_banco.sf_anuncio AS anun
                            LEFT JOIN sellfcom_banco.tipo_imovel AS tipoimo ON anun.tipo_imovel_id = tipoimo.id
                            LEFT JOIN sellfcom_banco.sf_anuncio_foto AS anunfoto ON anun.id = anunfoto.sf_anuncio_id");
    }

}
