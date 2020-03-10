<?php

namespace App\Http\Controllers;
use App\Libraries\Helpers;
use App\Model\Imoveis;

class VivaController extends Controller
{
    public function gerarXml(){
        // $dadosImoveis = Imoveis::getImoveisZapSellf();
        // $fotosImoveis = Imoveis::getFotosImoveisZapSellf();

        // $dadosImoveisArray = $this->gerarArrayMulti($dadosImoveis);
        // $dadosFotosImoveisArray = $this->gerarArrayMulti($fotosImoveis);
        
        // for ($i=0; $i < sizeof($dadosImoveisArray); $i++) {
        //     for ($j=0; $j < sizeof($dadosFotosImoveisArray); $j++) { 
        //         if($dadosImoveisArray[$i]['CodigoImovel'] == $dadosFotosImoveisArray[$j]['IdImovel']){
                    
        //             $dadosImoveisArray[$i]['Fotos'][$j]['NomeArquivo'] = $dadosFotosImoveisArray[$j]['NomeArquivo'];

        //             $dadosImoveisArray[$i]['Fotos'][$j]['URLArquivo'] = $dadosFotosImoveisArray[$j]['URLArquivo'];
                    
        //             if($dadosFotosImoveisArray[$j]['Principal'] == 1){
        //                 $dadosImoveisArray[$i]['Fotos'][$j]['Principal'] = 1;
        //             }
                    
        //             $dadosImoveisArray[$i]['Fotos'][$j]['Alterada'] = '1';
        //         }
                
        //     }
        // }    

        $nomeArquivo = "../xml/viva/IntegracaoSellf.xml";

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
                                <PublishDate>'.$dataAtual.'2018-05-29T17:47:57</PublishDate>
                                <Telephone>31-99463 3351</Telephone>
                            </Header>';
        
        $conteudoArquivo .= "<Listings>";
        $conteudoArquivo .=     "<Listing>";
        $conteudoArquivo .=         "<ListingID>29080</ListingID>";
        $conteudoArquivo .=     "</Listing>";
        $conteudoArquivo .= "</Listings>";


        $conteudoArquivo .= '</ListingDataFeed>';



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