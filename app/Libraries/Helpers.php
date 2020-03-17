<?php
namespace App\Libraries;
class Helpers {
    public static function arrayToXml($nomeTagPrincipal, $dados){
        $tagPrincipal = '';
        for ($i=0; $i < count($dados); $i++) { 
            $tagsXML = array_keys($dados[$i]);
            $tagPrincipal .= "<".$nomeTagPrincipal.">";
            for ( $j = 0; $j < count($tagsXML); $j++ ) {
                if($dados[$i][$tagsXML[$j]] != ''){
                    
                    if(is_array($dados[$i][$tagsXML[$j]])){
                        $tagPrincipal .= Helpers::criarTagAuxiliar('Foto', $dados[$i][$tagsXML[$j]]);
                    }else{
                        $tagPrincipal .= "<";
                        $tagPrincipal .= $tagsXML[$j];
                        $tagPrincipal .= ">";
                        $tagPrincipal .= $dados[$i][$tagsXML[$j]];
                        $tagPrincipal .= "</";
                        $tagPrincipal .= $tagsXML[$j];
                        $tagPrincipal .= ">";    
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

    public static function criarTagAuxiliar($titleTag, $array){
        $nameTag = '<Fotos>';
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
        $nameTag .= "</Fotos>";
        return $nameTag;
    }

}