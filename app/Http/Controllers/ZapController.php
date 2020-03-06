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
        $dadosFotosImoveisArray = $this->gerarArrayMulti($fotosImoveis);
        
        for ($i=0; $i < sizeof($dadosImoveisArray); $i++) {
            for ($j=0; $j < sizeof($dadosFotosImoveisArray); $j++) { 
                if($dadosImoveisArray[$i]['CodigoImovel'] == $dadosFotosImoveisArray[$j]['IdImovel']){
                    
                    $dadosImoveisArray[$i]['Fotos'][$j]['NomeArquivo'] = $dadosFotosImoveisArray[$j]['NomeArquivo'];

                    $dadosImoveisArray[$i]['Fotos'][$j]['URLArquivo'] = $dadosFotosImoveisArray[$j]['URLArquivo'];
                    
                    if($dadosFotosImoveisArray[$j]['Principal'] == 1){
                        $dadosImoveisArray[$i]['Fotos'][$j]['Principal'] = 1;
                    }
                    
                    $dadosImoveisArray[$i]['Fotos'][$j]['Alterada'] = '1';
                }
                
            }
        }

        $nomeArquivo = "../xml/zap/IntegracaoSellf.xml";

        $arquivo = fopen($nomeArquivo, 'w+');
    
        $conteudoArquivo = '<?xml version="1.0" encoding="UTF-8"?>';
        $conteudoArquivo .= '<Carga xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
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