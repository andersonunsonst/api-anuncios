<?php

/**  
* Controller que contém as regras de geração de XML 
* e interações da integração ImovelWeb
*
* @author Kevin Silva <kevinsilvatec@gmail.com>
* @version 1.0
* @access public  
* @package Controllers 
*
*/ 
namespace App\Http\Controllers;
use App\Libraries\Helpers;
use App\Model\Imoveis;

class MercadoLivreController extends Controller
{
    public function gerarXml(){
        $tipoIntegracao = 'mercadolivre';
        $blocoPadrao['email'] = "<email>mercadolivre@sellf.com.br</email>";
        $blocoPadrao['sellerContact']['contact'] = "Sellf";
        $blocoPadrao['sellerContact']['otherInfo'] = "None";
        $blocoPadrao['sellerContact']['areaCode'] = "31";
        $blocoPadrao['sellerContact']['phone'] = "984555300";
        $blocoPadrao['sellerContact']['email'] = "mercadolivre@sellf.com.br";
        $blocoPadrao['sellerContact']['webpage'] = "https://sellf.com.br";
        $blocoPadrao['listingType'] = "silver";
        $blocoPadrao['location'] = Imoveis::getLocalizacaoImoveisMercadoLivreSellf();
        $blocoPadrao['location'] = Imoveis::getLocalizacaoImoveisMercadoLivreSellf();
        $blocoPadrao['attributes'] = Imoveis::getAtributosImoveisMercadoLivreSellf();
        
        $dadosImoveis = Imoveis::getImoveisMercadoLivreSellf();
        $fotosImoveis = Imoveis::getFotosImoveisMercadoLivreSellf();
        
        $dadosImoveisArray = Helpers::gerarArrayMulti($dadosImoveis);
        $dadosFotosImoveisArray = Helpers::gerarArrayMulti($fotosImoveis);
        $blocoPadrao['location'] = Helpers::gerarArrayMulti($blocoPadrao['location']);
        $blocoPadrao['attributes'] = Helpers::gerarArrayMulti($blocoPadrao['attributes']);
        $blocoPadrao['attributes'] = Helpers::chavearAtributosImoveis($blocoPadrao['attributes']);
        
        $dadosImoveisArray = Helpers::mergeAtributos($dadosImoveisArray, $blocoPadrao);               
        $dadosImoveisArray = Helpers::mergeImoveisFotos($dadosImoveisArray, $dadosFotosImoveisArray, $tipoIntegracao);               
        $dadosImoveisArray = Helpers::mergeDadosVendedor($dadosImoveisArray, $blocoPadrao);
        $dadosImoveisArray = Helpers::mergeLocalização($dadosImoveisArray, $blocoPadrao);
        
        $nomeArquivo = "../xml/mercadolivre/IntegracaoSellf.xml";
        $nomeArquivoExibicao = "IntegracaoSellf.xml";
        
        $tagsImovel = Helpers::arrayToXml('imovel', $dadosImoveisArray, $tipoIntegracao);

        $arquivo = fopen($nomeArquivo, 'w+');   
         
        $conteudoArquivo = '<?xml version="1.0" encoding="UTF-8"?>';
        $conteudoArquivo .= '<ListingDataFeed xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://dev-test.mercadolibre.com/apps/validator.xsd">';
        $conteudoArquivo .= '<imoveis>';
        $conteudoArquivo .= $blocoPadrao['email'];
        $conteudoArquivo .= $tagsImovel;
        $conteudoArquivo .= '</imoveis>';
        $conteudoArquivo .= '</ListingDataFeed>';
        
        return Helpers::criarArquivo($nomeArquivoExibicao, $arquivo, $conteudoArquivo);
    }
}