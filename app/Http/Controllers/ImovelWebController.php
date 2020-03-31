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

class ImovelWebController extends Controller
{
    public function gerarXml(){
        $dadosImoveis = Imoveis::getImoveisImovelWebSellf();
        $fotosImoveis = Imoveis::getFotosImoveisImovelWebSellf();
        
        $dadosImoveis = Helpers::adaptarTipos($dadosImoveis);
        
        $dadosImoveisArray = Helpers::gerarArrayMulti($dadosImoveis);
        $dadosFotosImoveisArray = Helpers::gerarArrayMulti($fotosImoveis);
        
        $dadosImoveisArray = Helpers::mergeImoveisFotos($dadosImoveisArray, $dadosFotosImoveisArray);

        $nomeArquivo = "../xml/imovelweb/iw_ofertas.xml";
        $nomeArquivoExibicao = "iw_ofertas.xml";

        $arquivo = fopen($nomeArquivo, 'w+');
    
        $conteudoArquivo = '<?xml version="1.0" encoding="UTF-8"?>';
        $conteudoArquivo .= '<Carga xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
        $conteudoArquivo .= '<Imoveis>';
        
        $tagsImovel = Helpers::arrayToXml('Imovel', $dadosImoveisArray);

        $conteudoArquivo .= $tagsImovel;
        $conteudoArquivo .= '</Imoveis>';
        $conteudoArquivo .= '</Carga>';

        return Helpers::criarArquivo($nomeArquivoExibicao, $arquivo, $conteudoArquivo);
        
    }
}