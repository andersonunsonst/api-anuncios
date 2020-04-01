<?php
/**  
* Classe que contém os helpers de geração de XML
*
* @author Kevin Silva <kevinsilvatec@gmail.com>
* @version 1.0
* @access public  
* @package Libraries 
*
*/ 

namespace App\Libraries;

class Helpers {
    
    /** 
    * Função para fazer o De X Para de tipos de imovel da Sellf para 
    * outras plataformas
    *    
    * @name adaptarTipos
    * @access public 
    * @param Array $dadosImoveis
    * @return String 
    *
    */ 
    public static function adaptarTipos($dadosImoveis){
        foreach ($dadosImoveis as $dados) {
            if($dados->Numero == "" || is_null($dados->Numero)){
                $dados->Numero = 0;
            }
            if($dados->TipoImovel == "Apartamento"){
                $dados->TipoImovel = "Apartamento";
                $dados->SubTipoImovel = "Apartamento Padrão";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Andar-pilotis"){
                $dados->TipoImovel = "Apartamento";
                $dados->SubTipoImovel = "Apartamento Padrão";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Área Privativa"){
                $dados->TipoImovel = "Apartamento";
                $dados->SubTipoImovel = "Apartamento Padrão";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Barracão"){
                $dados->TipoImovel = "Apartamento";
                $dados->SubTipoImovel = "Apartamento Padrão";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Barracão"){
                $dados->TipoImovel = "Casa";
                $dados->SubTipoImovel = "Casa Padrão";
                $dados->CategoriaImovel = 'Térrea';
            }else if($dados->TipoImovel == "Barracão"){
                $dados->TipoImovel = "Casa";
                $dados->SubTipoImovel = "Casa Padrão";
                $dados->CategoriaImovel = 'Térrea';
            }else if($dados->TipoImovel == "Casa"){
                $dados->TipoImovel = "Casa";
                $dados->SubTipoImovel = "Casa Padrão";
                $dados->CategoriaImovel = 'Térrea';
            }else if($dados->TipoImovel == "Casa Comercial"){
                $dados->TipoImovel = "Comercial/Industrial";
                $dados->SubTipoImovel = "Casa Comercial";
                $dados->CategoriaImovel = 'Térrea';
            }else if($dados->TipoImovel == "Casa em Condomínio"){
                $dados->TipoImovel = "Casa";
                $dados->SubTipoImovel = "Casa de Condomínio";
                $dados->CategoriaImovel = 'Térrea';
            }else if($dados->TipoImovel == "Fazenda"){
                $dados->TipoImovel = "Rural";
                $dados->SubTipoImovel = "Fazenda";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Hotel Fazenda"){
                $dados->TipoImovel = "Rural";
                $dados->SubTipoImovel = "Fazenda";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Kitchenette"){
                $dados->TipoImovel = "Apartamento";
                $dados->SubTipoImovel = "Kitchenette/Conjugados";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Loja"){
                $dados->TipoImovel = "Comercial/Industrial";
                $dados->SubTipoImovel = "Loja/Salão";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Lote-Terreno"){
                $dados->TipoImovel = "Terreno";
                $dados->SubTipoImovel = "Terreno Padrão";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Sala"){
                $dados->TipoImovel = "Comercial/Industrial";
                $dados->SubTipoImovel = "Conjunto Comercial/Sala";
                $dados->CategoriaImovel = 'Padrão';
            }else if($dados->TipoImovel == "Sitio"){
                $dados->TipoImovel = "Rural";
                $dados->SubTipoImovel = "Sítio";
                $dados->CategoriaImovel = 'Padrão';
            }else{
                $dados->TipoImovel = "Casa";
                $dados->SubTipoImovel = "Casa Padrão";
                $dados->CategoriaImovel = 'Térrea';
            }
        }
        return $dadosImoveis;
    }

    /** 
    * Função para  Converter gerar array multidimensional
    *
    * @name gerarArrayMulti
    * @access public 
    * @param Array $object
    * @return String 
    *
    */
    public static function gerarArrayMulti($object){
        $array = [];
        
        for ($i=0; $i < sizeof($object); $i++) { 
            # code...
            array_push($array, get_object_vars($object[$i]));
        }

        return $array;
    }

    /** 
    * Função para relacionar os imóveis às suas respectivas fotos
    *
    * @name mergeImoveisFotos
    * @access public 
    * @param Array $dadosImoveisArray
    * @param Array $dadosFotosImoveis
    * @return Array 
    *
    */ 
    public static function mergeImoveisFotos($dadosImoveisArray, $dadosFotosImoveisArray, $tipoIntegracao){
        for ($i=0; $i < sizeof($dadosImoveisArray); $i++) {
            
            if($tipoIntegracao == "imovelweb"){
                $dadosImoveisArray[$i]["CodigoCentralVendas"] = "";
            }

            for ($j=0; $j < sizeof($dadosFotosImoveisArray); $j++) { 
                
                if($dadosImoveisArray[$i]['CodigoImovel'] == $dadosFotosImoveisArray[$j]['IdImovel']){
                    $dadosImoveisArray[$i]['Fotos'][$j]['NomeArquivo'] = $dadosFotosImoveisArray[$j]['NomeArquivo'];
                    $dadosImoveisArray[$i]['Fotos'][$j]['URLArquivo'] = $dadosFotosImoveisArray[$j]['URLArquivo'];
                    if($dadosFotosImoveisArray[$j]['Principal'] && $dadosFotosImoveisArray[$j]['Principal'] == 1){
                        $dadosImoveisArray[$i]['Fotos'][$j]['Principal'] = 1;
                    }
                    if($tipoIntegracao == "zap" || $tipoIntegracao == "olx"){
                        $dadosImoveisArray[$i]['Fotos'][$j]['Alterada'] = '1';
                    }
                }
                
            }

        }
        return $dadosImoveisArray;
    }
    
    /** 
    * Função para  Converter array multidimensional em tags XML
    *
    * @name arrayToXML
    * @access public 
    * @param String $nomeTagPrincipal
    * @param Array $dados
    * @return String 
    *
    */ 
    public static function arrayToXml($nomeTagPrincipal, $dados){
        $tagPrincipal = '';
        for ($i=0; $i < count($dados); $i++) { 
            
            $tagsXML = array_keys($dados[$i]);
            $tagPrincipal .= "<".$nomeTagPrincipal.">";
            for ( $j = 0; $j < count($tagsXML); $j++ ) {
                
                if($dados[$i][$tagsXML[$j]] != ''){
                    
                    if(is_array($dados[$i][$tagsXML[$j]])){
                        $tagPrincipal .= Helpers::criarTagAuxiliar('Fotos','Foto', $dados[$i][$tagsXML[$j]]);
                    }else{    
                        if($dados[$i][$tagsXML[$j]] == 'Observacao'){
                            $tagPrincipal .= "<";
                            $tagPrincipal .= $tagsXML[$j];
                            $tagPrincipal .= ">";
                            $tagPrincipal .= "<![CDATA[".$dados[$i][$tagsXML[$j]]."]]>";
                            $tagPrincipal .= "</";
                            $tagPrincipal .= $tagsXML[$j];
                            $tagPrincipal .= ">";
                        }else{
                            $tagPrincipal .= "<";
                            $tagPrincipal .= $tagsXML[$j];
                            $tagPrincipal .= ">";
                            $tagPrincipal .= $dados[$i][$tagsXML[$j]];
                            $tagPrincipal .= "</";
                            $tagPrincipal .= $tagsXML[$j];
                            $tagPrincipal .= ">";    
                        }
                    }     

                }else{
                    $tagPrincipal .= "<";
                    $tagPrincipal .= $tagsXML[$j];
                    $tagPrincipal .= " />";
                }

            }
            $tagPrincipal .= "</".$nomeTagPrincipal.">";

        }
        return $tagPrincipal;
    }

    /** 
    * Função para criar as tags de fotos
    *    
    * @name criarTagAuxiliar
    * @access public 
    * @param String $parentTag
    * @param String $titleTag
    * @param Array $array
    * @return String 
    *
    */ 
    public static function criarTagAuxiliar($parentTag, $titleTag, $array){
        $nameTag = '<'.$parentTag.'>';
        
        foreach ($array as $a) {
            $nameTag .= "<Foto>";
            $nameTag .= "<NomeArquivo>";
            $nameTag .= $a['NomeArquivo'];
            $nameTag .= "</NomeArquivo>";
            
            $nameTag .= "<URLArquivo>";
            $nameTag .= $a['URLArquivo'];
            $nameTag .= "</URLArquivo>";
            
            if(array_key_exists('Alterada', $a)){
                $nameTag .= "<Alterada>";
                $nameTag .= $a['Alterada'];
                $nameTag .= "</Alterada>";
            }
            $nameTag .= "</Foto>";
            
        }

        $nameTag .= '</'.$parentTag.'>';
        return $nameTag;
    }

    /** 
    * Função para criar o arquivo. Retorna a mensagem de erro ou sucesso
    *    
    * @name criarArquivo
    * @access public 
    * @param String $arquivo
    * @param String $conteudoArquivo
    * @return jSON
    *
    */ 
    public static function criarArquivo($nomeArquivoExibicao, $arquivo, $conteudoArquivo){
        $retorno = [];
    
        if(fwrite($arquivo, $conteudoArquivo)){
            fclose($arquivo); 
            $retorno['codigo'] = "200";
            $retorno['mensagem'] = "Arquivo ".$nomeArquivoExibicao." criado com Sucesso!";
        }else{
            $retorno['codigo'] = "500";
            $retorno['mensagem'] = "Ocorreu um erro ao tentar criar o arquivo!";
        }
        return json_encode($retorno);
    }

}