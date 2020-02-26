<?php
namespace App\Libraries;
class Helpers {
    public static function arrayToXml($nomeTagPrincipal, $tagsAuxiliares, $dados){
        $tagPrincipal = '';
        for ($i=0; $i < count($dados); $i++) { 
            $tagsXML = array_keys($dados[$i]);
            $tagPrincipal .= "<".$nomeTagPrincipal.">";
            for ( $j = 0; $j < count($tagsXML); $j++ ) {
                if($dados[$i][$tagsXML[$j]] != ''){
                    if(is_array($dados[$i][$tagsXML[$j]])){
                        $tagPrincipal .= "<".$tagsXML[$j].">";
                        if ($tagsXML[$j] == 'Fotos') {
                            $tagPrincipal .= Helpers::arrayToXml($tagsAuxiliares[0], $tagsAuxiliares, $dados[$i][$tagsXML[$j]]);
                        }else{
                            $tagPrincipal .= Helpers::arrayToXml($tagsAuxiliares[1], $tagsAuxiliares, $dados[$i][$tagsXML[$j]]);
                        }
                        $tagPrincipal .= "</".$tagsXML[$j].">";
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
}