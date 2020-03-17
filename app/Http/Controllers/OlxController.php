<?php

namespace App\Http\Controllers;
use App\Libraries\Helpers;
use App\Model\Imoveis;

class OlxController extends Controller
{
    public function gerarXml(){
        $dadosImoveis = Imoveis::getImoveisOlxSellf();
        $fotosImoveis = Imoveis::getFotosImoveisOlxSellf();
        
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

        $dadosImoveisArray = $this->gerarArrayMulti($dadosImoveis);
        $dadosFotosImoveisArray = $this->gerarArrayMulti($fotosImoveis);
        
        for ($i=0; $i < sizeof($dadosImoveisArray); $i++) {
            
            for ($j=0; $j < sizeof($dadosFotosImoveisArray); $j++) { 
                
                if($dadosImoveisArray[$i]['CodigoImovel'] == $dadosFotosImoveisArray[$j]['IdImovel']){
                    
                    $dadosImoveisArray[$i]['Fotos'][$j]['NomeArquivo'] = $dadosFotosImoveisArray[$j]['NomeArquivo'];

                    $dadosImoveisArray[$i]['Fotos'][$j]['URLArquivo'] = $dadosFotosImoveisArray[$j]['URLArquivo'];
                }

            }
        }

        $nomeArquivo = "../xml/olx/IntegracaoSellf.xml";

        $arquivo = fopen($nomeArquivo, 'w+');
    
        $conteudoArquivo = '<?xml version="1.0" encoding="UTF-8"?>';
        $conteudoArquivo .= '<Carga xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
        $conteudoArquivo .= '<CodigoCliente />';
        $conteudoArquivo .= '<Imoveis>';
        
        $tagsImovel = Helpers::arrayToXml('Imovel', $dadosImoveisArray);

        $conteudoArquivo .= $tagsImovel;
        $conteudoArquivo .= '</Imoveis>';
        $conteudoArquivo .= '</Carga>';
        fwrite($arquivo, $conteudoArquivo);
        fclose($arquivo); 
    }

    public function gerarArrayMulti($object){
        $array = [];
        
        for ($i=0; $i < sizeof($object); $i++) { 
            # code...
            array_push($array, get_object_vars($object[$i]));
        }
        return $array;
    }
}