<?php

/**  
* Controller que contém as regras de geração de XML 
* e interações da integração VivaReal
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

class VivaController extends Controller
{
    public function gerarXml(){ 

        $nomeArquivo = "../xml/viva/IntegracaoSellf.xml";
        $nomeArquivoExibicao = "IntegracaoSellf.xml";

        $dataAtual = date('Y-m-d\TH:i:s');

        $arquivo = fopen($nomeArquivo, 'w+');
    
        $conteudoArquivo = '<?xml version="1.0" encoding="UTF-8"?>';
        $conteudoArquivo .= '<ListingDataFeed xmlns="http://www.vivareal.com/schemas/1.0/VRSync"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.vivareal.com/schemas/1.0/VRSync">';
        $conteudoArquivo .= '<Header>
                                <Provider>CodesCave</Provider>
                                <Email>kevinsilvatec@gmail.com.br</Email>
                                <ContactName>Kevin Silva</ContactName>
                                <PublishDate>'.$dataAtual.'</PublishDate>
                                <Telephone>31-99463-3351</Telephone>
                            </Header>';
        
        $conteudoArquivo .= "<Listings>";
        $conteudoArquivo .=     "<Listing>";
        $conteudoArquivo .=         "<ListingID>29080</ListingID>";
        $conteudoArquivo .=     "</Listing>";
        $conteudoArquivo .= "</Listings>";


        $conteudoArquivo .= '</ListingDataFeed>';

        return Helpers::criarArquivo($nomeArquivoExibicao, $arquivo, $conteudoArquivo);
    }
}