<?php
/**  
* Model que contém as consultas SQL na base 
* da Sellf. As consultas são feitas por integração
*
* @author Kevin Silva <kevinsilvatec@gmail.com>
* @version 1.0
* @access public  
* @package Model 
*
*/ 

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Imoveis
{

    public $table = 'sf_anuncio';
    
    public $timestamps = false;
    
    protected $connection= 'sellf';

    public $fillable = [];

    /**
     * Casts de variáveis
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Regras de Validação
     *
     * @var array
     */
    public static $rules = [];
    
    /** 
    * Função que busca os imóveis da Sellf para Zap
    *    
    * @name getImoveisZapSellf
    * @access public 
    * @return StdClass object
    *
    */
    public static function getImoveisZapSellf(){
        return DB::select("SELECT anun.id AS CodigoImovel, anun.descricao AS Observacao,
        anun.valor AS PrecoVenda, anun.cep AS CEP,
        anun.logradouro AS Endereco, anun.numero AS Numero, anun.bairro AS Bairro, estado.sigla AS UF, anun.cidade_id AS Cidade,
        anun.area_util AS AreaUtil, anun.area_util AS AreaTotal, anun.quartos AS QtdDormitorios,
        anun.suites_semar AS QtdSuites, anun.banheiros AS QtdBanheiros, anun.vagas AS QtdVagas,
        anun.iptu AS ValorIPTU, anun.condominio AS PrecoCondominio, anun.mobiliado AS Mobiliado,
        anun.armarios_cozinha AS ArmarioCozinha, anun.banheira_hidro AS Hidromassagem,
        anun.area_servico AS AreaServico, anun.tem_varanda AS Varanda, anun.quarto_servico AS QuartoWCEmpregada,
        anun.banheiro_servico AS WCEmpregada, anun.tem_piscina_privativa AS Piscina, anun.quintal AS Quintal, 
        anun.ar_condicionado AS ArCondicionado, anun.elevador AS QtdElevador, anun.playground AS Playground,
        anun.salao_festas AS SalaoFestas, anun.quadra_condominio AS QuadraPoliEsportiva,
        anun.sauna_condominio AS Sauna, anun.lavanderia_condominio AS LavanderiaColetiva, anun.churrasqueira_condominio AS Churrasqueira,
        anun.complemento AS Complemento, anun.valor_mensal AS ValorMensal, tipoimo.nome AS SubTipoImovel, tipoimo.nome AS TipoImovel
        FROM sellfcom_banco.sf_anuncio AS anun
        LEFT JOIN sellfcom_banco.tipo_imovel AS tipoimo ON anun.tipo_imovel_id = tipoimo.id
        LEFT JOIN sellfcom_banco.estado ON anun.estado_id = estado.id");
    }

    /** 
    * Função que busca as fotos dos imóveis da Sellf para Zap 
    *    
    * @name getFotosImoveisZapSellf
    * @access public 
    * @return StdClass object
    *
    */
    public static function getFotosImoveisZapSellf(){
        return DB::select('SELECT id, sf_anuncio_id AS IdImovel, imagem AS NomeArquivo, 
                            CONCAT("https://sellf.com.br/images/anuncio/", imagem) AS URLArquivo,
                            Principal AS Principal
                            FROM sellfcom_banco.sf_anuncio_foto AS anunfoto
                            WHERE sf_anuncio_id IS NOT NULL;');
    }
    
    /** 
    * Função que busca os imóveis da Sellf para OLX
    *    
    * @name getImoveisOlxSellf
    * @access public 
    * @return StdClass object
    *
    */
    public static function getImoveisOlxSellf(){
        return DB::select("SELECT anun.id AS CodigoImovel, anun.descricao AS Observacao,
        anun.valor AS PrecoVenda, anun.cep AS CEP,
        anun.logradouro AS Endereco, anun.numero AS Numero, anun.bairro AS Bairro, estado.sigla AS UF, anun.cidade_id AS Cidade,
        anun.area_util AS AreaUtil, anun.area_util AS AreaTotal, anun.quartos AS QtdDormitorios,
        anun.suites_semar AS QtdSuites, anun.banheiros AS QtdBanheiros, anun.vagas AS QtdVagas,
        anun.iptu AS ValorIPTU, anun.condominio AS PrecoCondominio, anun.mobiliado AS Mobiliado,
        anun.armarios_cozinha AS ArmarioCozinha, anun.banheira_hidro AS Hidromassagem,
        anun.area_servico AS AreaServico, anun.tem_varanda AS Varanda, anun.quarto_servico AS QuartoWCEmpregada,
        anun.banheiro_servico AS WCEmpregada, anun.tem_piscina_privativa AS Piscina, anun.quintal AS Quintal, 
        anun.ar_condicionado AS ArCondicionado, anun.elevador AS QtdElevador, anun.playground AS Playground,
        anun.salao_festas AS SalaoFestas, anun.quadra_condominio AS QuadraPoliEsportiva,
        anun.sauna_condominio AS Sauna, anun.lavanderia_condominio AS LavanderiaColetiva, anun.churrasqueira_condominio AS Churrasqueira,
        anun.complemento AS Complemento, anun.valor_mensal AS ValorMensal, tipoimo.nome AS SubTipoImovel, tipoimo.nome AS TipoImovel
        FROM sellfcom_banco.sf_anuncio AS anun
        LEFT JOIN sellfcom_banco.tipo_imovel AS tipoimo ON anun.tipo_imovel_id = tipoimo.id
        LEFT JOIN sellfcom_banco.estado ON anun.estado_id = estado.id");
    }

    /** 
    * Função que busca as fotos dos imóveis da Sellf para OLX 
    *    
    * @name getFotosImoveisOlxSellf
    * @access public 
    * @return StdClass object
    *
    */
    public static function getFotosImoveisOlxSellf(){
        return DB::select('SELECT id, sf_anuncio_id AS IdImovel, imagem AS NomeArquivo, 
                            CONCAT("https://sellf.com.br/images/anuncio/", imagem) AS URLArquivo
                            FROM sellfcom_banco.sf_anuncio_foto AS anunfoto
                            WHERE sf_anuncio_id IS NOT NULL;');
    }


    /** 
    * Função que busca os imóveis da Sellf para Imovel Web 
    *    
    * @name getImoveisImovelWebSellf
    * @access public 
    * @return StdClass object
    *
    */
    public static function getImoveisImovelWebSellf(){
        return DB::select("SELECT anun.id AS CodigoImovel, anun.descricao AS Observacao,
        anun.valor AS PrecoVenda, anun.cep AS CEP,
        anun.logradouro AS Logradouro, anun.numero AS Numero, anun.bairro AS Bairro, estado.sigla AS UF, anun.cidade_id AS Cidade,
        anun.area_util AS AreaUtil, anun.area_util AS AreaTotal, anun.quartos AS QtdDormitorios,
        anun.suites_semar AS QtdSuites, anun.banheiros AS QtdBanheiros, anun.vagas AS QtdVagas,
        anun.iptu AS PrecoIptuImovel, anun.condominio AS PrecoCondominio, anun.mobiliado AS Mobiliado,
        anun.armarios_cozinha AS ArmarioCozinha, anun.banheira_hidro AS Hidromassagem,
        anun.area_servico AS AreaServico, anun.tem_varanda AS Varanda, anun.quarto_servico AS QuartoWCEmpregada,
        anun.banheiro_servico AS WCEmpregada, anun.tem_piscina_privativa AS Piscina, anun.quintal AS Quintal, 
        anun.ar_condicionado AS ArCondicionado, anun.elevador AS QtdElevador, anun.playground AS Playground,
        anun.salao_festas AS SalaoFestas, anun.quadra_condominio AS QuadraPoliEsportiva,
        anun.sauna_condominio AS Sauna, anun.lavanderia_condominio AS LavanderiaColetiva, anun.churrasqueira_condominio AS Churrasqueira,
        anun.complemento AS Complemento, anun.valor_mensal AS ValorMensal, tipoimo.nome AS SubTipoImovel, tipoimo.nome AS TipoImovel
        FROM sellfcom_banco.sf_anuncio AS anun
        LEFT JOIN sellfcom_banco.tipo_imovel AS tipoimo ON anun.tipo_imovel_id = tipoimo.id
        LEFT JOIN sellfcom_banco.estado ON anun.estado_id = estado.id");
    }

    /** 
    * Função que busca as fotos dos imóveis da Sellf para Imovel Web 
    *    
    * @name getFotosImoveisImovelWebSellf
    * @access public 
    * @return StdClass object
    *
    */
    public static function getFotosImoveisImovelWebSellf(){
        return DB::select('SELECT id, sf_anuncio_id AS IdImovel, imagem AS NomeArquivo, 
                            CONCAT("https://sellf.com.br/images/anuncio/", imagem) AS URLArquivo,
                            Principal AS Principal
                            FROM sellfcom_banco.sf_anuncio_foto AS anunfoto
                            WHERE sf_anuncio_id IS NOT NULL;');
    }

}
