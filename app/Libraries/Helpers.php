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
    * Função para converter Objeto StData em array multidimensional
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
                $dadosImoveisArray[$i]["CodigoCentralVendas"] = "47332310";
            }

            for ($j=0; $j < sizeof($dadosFotosImoveisArray); $j++) { 
                if($tipoIntegracao == "mercadolivre"){
                    if($dadosImoveisArray[$i]['imovelId'] == $dadosFotosImoveisArray[$j]['IdImovel']){
                        $dadosImoveisArray[$i]['pictures'][$j]['imageURL'] = $dadosFotosImoveisArray[$j]['imageURL'];
                    }
                }else{
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
    public static function arrayToXml($nomeTagPrincipal, $dados, $tipoIntegracao){
        $tagPrincipal = '';
        for ($i=0; $i < count($dados); $i++) { 
            
            $tagsXML = array_keys($dados[$i]);
            $tagPrincipal .= "<".$nomeTagPrincipal.">";
            for ( $j = 0; $j < count($tagsXML); $j++ ) {
                
                if($dados[$i][$tagsXML[$j]] != ''){
                    if($tipoIntegracao == 'imovelweb'){
                        $dados[$i][$tagsXML[$j]] = mb_convert_encoding($dados[$i][$tagsXML[$j]], 'ISO-8859-1');
                    }
                    if(is_array($dados[$i][$tagsXML[$j]])){
                        if($tipoIntegracao == "mercadolivre"){
                            // var_dump($dados[$i][$tagsXML[$j]][0]);
                            // exit;
                            $tagPrincipal .= Helpers::criarTagsAuxiliaresMl($dados[$i][$tagsXML[$j]]);
                        }else{
                            $tagPrincipal .= Helpers::criarTagAuxiliar('Fotos','Foto', $dados[$i][$tagsXML[$j]]);
                        }
                    }else{    
                        if($dados[$i][$tagsXML[$j]] == 'Observacao' || $dados[$i][$tagsXML[$j]] == 'description'|| $dados[$i][$tagsXML[$j]] == 'category'){
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
    * Função para criar as tags auxiliares do Mercado Livre    
    * 
    * @name criarTagsAuxiliaresMl
    * @access public 
    * @param Array $array
    * @return String 
    *
    */ 
    public static function criarTagsAuxiliaresMl($array){
        foreach ($array as $a) {
            if(array_key_exists('imageURL', $a)){
                $parentTag = 'pictures';
            }else if(array_key_exists('addressLine', $a)){
                $parentTag = 'location';
            }else if(array_key_exists('contact', $a)){
                $parentTag = 'sellerContact';
            }else{
                $parentTag = 'attributes';
            }
        }

        $nameTag = '<'.$parentTag.'>';
        
        if($parentTag == 'pictures'){
            
            foreach ($array as $a) {
                $nameTag .= "<imageURL>";
                $nameTag .= $a['imageURL'];
                $nameTag .= "</imageURL>";
            }

        }else if($parentTag == 'location'){
            foreach ($array as $a) {
                $nameTag .= "<addressLine>";
                $nameTag .= $a['addressLine'];
                $nameTag .= "</addressLine>";
                
                $nameTag .= "<zipCode>";
                $nameTag .= $a['zipCode'];
                $nameTag .= "</zipCode>";
                
                $nameTag .= "<neighborhood>";
                $nameTag .= $a['neighborhood'];
                $nameTag .= "</neighborhood>";
    
                $nameTag .= "<zipCode>";
                $nameTag .= $a['zipCode'];
                $nameTag .= "</zipCode>";
                
                $nameTag .= "<city>";
                $nameTag .= $a['city'];
                $nameTag .= "</city>";
    
                $nameTag .= "<state>";
                $nameTag .= $a['state'];
                $nameTag .= "</state>";
    
                $nameTag .= "<country>";
                $nameTag .= $a['country'];
                $nameTag .= "</country>";
            }
        }else if($parentTag == 'sellerContact'){
            foreach ($array as $a) {
                $nameTag .= "<contact>";
                $nameTag .= $a['contact'];
                $nameTag .= "</contact>";
                
                $nameTag .= "<otherInfo>";
                $nameTag .= $a['otherInfo'];
                $nameTag .= "</otherInfo>";
                
                $nameTag .= "<areaCode>";
                $nameTag .= $a['areaCode'];
                $nameTag .= "</areaCode>";
    
                $nameTag .= "<phone>";
                $nameTag .= $a['phone'];
                $nameTag .= "</phone>";
                
                $nameTag .= "<email>";
                $nameTag .= $a['email'];
                $nameTag .= "</email>";
    
                $nameTag .= "<webpage>";
                $nameTag .= $a['webpage'];
                $nameTag .= "</webpage>";
                
            }
        }else if($parentTag == 'attributes'){
            for ($i=0; $i < sizeof($array); $i++) { 
                $nameTag .= "<attribute>";
                $nameTag .= "<name>";
                $nameTag .= $a['name'];
                $nameTag .= "</name>";
                $nameTag .= "<value>";
                $nameTag .= $a['value'];
                $nameTag .= "</value>";
                $nameTag .= "</attribute>";
            }

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

    /** 
    * Função para relacionar os imóveis à seus anunciantes (bloco específico para o ML)
    *
    * @name mergeDadosVendedor
    * @access public 
    * @param Array $dadosImoveisArray
    * @param Array $blocoPadrao
    * @return Array 
    *
    */ 

    public static function mergeDadosVendedor($dadosImoveisArray, $blocoPadrao){
        
        for ($i=0; $i < sizeof($dadosImoveisArray); $i++) {
            for ($j=0; $j < sizeof($blocoPadrao['sellerContact']); $j++) {                     
                    $dadosImoveisArray[$i]['sellerContact'][0]['contact'] = $blocoPadrao['sellerContact']['contact'];
                    $dadosImoveisArray[$i]['sellerContact'][0]['otherInfo'] = $blocoPadrao['sellerContact']['otherInfo'];
                    $dadosImoveisArray[$i]['sellerContact'][0]['areaCode'] = $blocoPadrao['sellerContact']['areaCode'];
                    $dadosImoveisArray[$i]['sellerContact'][0]['phone'] = $blocoPadrao['sellerContact']['phone'];
                    $dadosImoveisArray[$i]['sellerContact'][0]['email'] = $blocoPadrao['sellerContact']['email'];
                    $dadosImoveisArray[$i]['sellerContact'][0]['webpage'] = $blocoPadrao['sellerContact']['webpage'];
                    $dadosImoveisArray[$i]['listingType'] = 'silver';
            }
        }

        return $dadosImoveisArray;
    }

    /** 
    * Função para relacionar os imóveis à sua localização (bloco específico para o ML)
    *
    * @name mergeLocalização
    * @access public 
    * @param Array $dadosImoveisArray
    * @param Array $blocoPadrao
    * @return Array 
    *
    */ 
    public static function mergeLocalização($dadosImoveisArray, $blocoPadrao){

        for ($i=0; $i < sizeof($dadosImoveisArray); $i++) {
            for ($j=0; $j < sizeof($blocoPadrao['location']); $j++) { 

                if($dadosImoveisArray[$i]['imovelId'] == $blocoPadrao['location'][$j]['imovelId']){
                    
                    $dadosImoveisArray[$i]['location'][$j]['addressLine'] = $blocoPadrao['location'][$j]['addressLine'];
                    $dadosImoveisArray[$i]['location'][$j]['zipCode'] = $blocoPadrao['location'][$j]['zipCode'];
                    $dadosImoveisArray[$i]['location'][$j]['neighborhood'] = $blocoPadrao['location'][$j]['neighborhood'];
                    $dadosImoveisArray[$i]['location'][$j]['city'] = $blocoPadrao['location'][$j]['city'];
                    $dadosImoveisArray[$i]['location'][$j]['state'] = $blocoPadrao['location'][$j]['state'];
                    $dadosImoveisArray[$i]['location'][$j]['country'] = "Brasil";
        
                }

            }
        }

        return $dadosImoveisArray;
    }

    /** 
    * Função para relacionar os imóveis à seus atributos (bloco específico para o ML)
    *
    * @name mergeAtributos
    * @access public 
    * @param Array $dadosImoveisArray
    * @param Array $blocoPadrao
    * @return Array 
    *
    */ 
    public static function mergeAtributos($dadosImoveisArray, $blocoPadrao){

        for ($i=0; $i < sizeof($dadosImoveisArray); $i++) {
            for ($j=0; $j < sizeof($blocoPadrao['attributes']); $j++) { 

                if($dadosImoveisArray[$i]['imovelId'] == $blocoPadrao['attributes'][$i]['imovelId']){ 
                    $dadosImoveisArray[$i]['attributes'][0]['name'] = $blocoPadrao['attributes'][$i]['attribute'][0]['name'];
                    $dadosImoveisArray[$i]['attributes'][0]['value'] = $blocoPadrao['attributes'][$i]['attribute'][0]['value'];

                    $dadosImoveisArray[$i]['attributes'][1]['name'] = $blocoPadrao['attributes'][$i]['attribute'][1]['name'];
                    $dadosImoveisArray[$i]['attributes'][1]['value'] = $blocoPadrao['attributes'][$i]['attribute'][1]['value'];
                    
                    $dadosImoveisArray[$i]['attributes'][2]['name'] = $blocoPadrao['attributes'][$i]['attribute'][2]['name'];
                    $dadosImoveisArray[$i]['attributes'][2]['value'] = $blocoPadrao['attributes'][$i]['attribute'][2]['value'];

                    $dadosImoveisArray[$i]['attributes'][3]['name'] = $blocoPadrao['attributes'][$i]['attribute'][3]['name'];
                    $dadosImoveisArray[$i]['attributes'][3]['value'] = $blocoPadrao['attributes'][$i]['attribute'][3]['value'];

                    $dadosImoveisArray[$i]['attributes'][4]['name'] = $blocoPadrao['attributes'][$i]['attribute'][4]['name'];
                    $dadosImoveisArray[$i]['attributes'][4]['value'] = $blocoPadrao['attributes'][$i]['attribute'][4]['value'];

                }
                
            }
        }

        return $dadosImoveisArray;

    }

     /** 
    * Função para chavear os atributos do imóvel de acordo transformado todos em
    * name = ""
    * value = ""
    *(bloco específico para o ML)
    *
    * @name chavearAtributosImoveis
    * @access public 
    * @param Array $array
    * @return Array 
    *
    */
    
    public static function chavearAtributosImoveis($array){
        $arrayRetorno = [];
        $arrayFinal = [];
        
        foreach ($array as $a) {
            $arrayRetorno['imovelId']= $a['imovelId'];
            $arrayRetorno['attribute']['area_util'] = $a['area_util'];
            $arrayRetorno['attribute']['area_total'] = $a['area_total'];
            $arrayRetorno['attribute']['armarios_embutidos'] = $a['armarios_embutidos'];
            $arrayRetorno['attribute']['quartos'] = $a['quartos'];
            $arrayRetorno['attribute']['banheiros'] = $a['banheiros'];
            array_push($arrayFinal, $arrayRetorno);
        }
        
        for ($i=0; $i <sizeof($arrayFinal) ; $i++) { 
            $arrayCerto = [];
            $chavesArray = array_keys($arrayFinal[$i]['attribute']);
            
            $areaUtil = $arrayFinal[$i]['attribute']['area_util'];
            $arrayFinal[$i]['attribute'][0] = [];
            $arrayFinal[$i]['attribute'][0]['name'] = 'Área Útil';
            $arrayFinal[$i]['attribute'][0]['value'] = $areaUtil;
            unset($arrayFinal[$i]['attribute']['area_util']);

            $areaTotal = $arrayFinal[$i]['attribute']['area_total'];
            $arrayFinal[$i]['attribute'][1] = [];
            $arrayFinal[$i]['attribute'][1]['name'] = 'Área Total';
            $arrayFinal[$i]['attribute'][1]['value'] = $areaTotal;
            unset($arrayFinal[$i]['attribute']['area_total']);

            $areaTotal = $arrayFinal[$i]['attribute']['armarios_embutidos'];
            $arrayFinal[$i]['attribute'][2] = [];
            $arrayFinal[$i]['attribute'][2]['name'] = 'Armários Embutidos';
            $arrayFinal[$i]['attribute'][2]['value'] = $areaTotal;
            unset($arrayFinal[$i]['attribute']['armarios_embutidos']);

            $areaTotal = $arrayFinal[$i]['attribute']['quartos'];
            $arrayFinal[$i]['attribute'][3] = [];
            $arrayFinal[$i]['attribute'][3]['name'] = 'Quartos';
            $arrayFinal[$i]['attribute'][3]['value'] = $areaTotal;
            unset($arrayFinal[$i]['attribute']['quartos']);

            $areaTotal = $arrayFinal[$i]['attribute']['banheiros'];
            $arrayFinal[$i]['attribute'][4] = [];
            $arrayFinal[$i]['attribute'][4]['name'] = 'Banheiros';
            $arrayFinal[$i]['attribute'][4]['value'] = $areaTotal;
            unset($arrayFinal[$i]['attribute']['banheiros']);

        }
        
        return $arrayFinal;       
    }

}
