<?php

namespace App\Http\Controllers;
use App\Libraries\Helpers;
use App\Model\Imoveis;

class ZapController extends Controller
{
    public function gerarXml(){
        $dadosImoveis = Imoveis::getImoveisZapSellf();
        $fotosImoveis = Imoveis::getFotosImoveisZapSellf();

        $dadosImoveisArray = $this->gerarArrayMulti($dadosImoveis);
        $fotosArray = $this->gerarArrayMulti($fotosImoveis);

        
        for ($i=0; $i < sizeof($fotosArray); $i++) { 
            var_dump($fotosArray[$i]);
            exit;
        }
        
        for ($i=0; $i < sizeof($dadosImoveisArray) ; $i++) { 
            // var_dump($dadosImoveisArray[$i]);
            var_dump($fotosArray);
            exit;
        }
        // $fotosImoveisArray = $this->gerarArrayMulti($dadosImoveis);
        
        $nomeArquivo = "../xml/zap/IngegracaoSellf.xml";

        $arquivo = fopen($nomeArquivo, 'w+');
    
        $conteudoArquivo = '<?xml version="1.0" encoding="UTF-8"?>';
        $conteudoArquivo .= '<Carga xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
        $conteudoArquivo .= '<Imoveis>';
        
        $tagsAuxiliares = array(
            0 => 'Foto',
            1 => 'Video'
        );

        $tagsImovel = Helpers::arrayToXml('Imovel', $tagsAuxiliares, $dadosImoveisArray);

        $conteudoArquivo .= $tagsImovel;
        $conteudoArquivo .= '</Imoveis>';
        $conteudoArquivo .= '</Carga>';
        var_dump($conteudoArquivo);
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