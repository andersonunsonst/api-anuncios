<?php

namespace App\Http\Controllers;

class ZapController extends Controller
{
    public function gerarXmlZap(){


        $meus_links = array();
        $meus_links[0]['id'] = '1';
        $meus_links[0]['title'] = 'Teste 1';
        $meus_links[0]['description'] = 'Desc 1';
        $meus_links[0]['image'] = 'Image 1';
        $meus_links[1]['id'] = '2';
        $meus_links[1]['title'] = 'Teste 2';
        $meus_links[1]['description'] = 'Desc 2';
        $meus_links[1]['image'] = 'Image 2';
        $meus_links[2]['id'] = '3';
        $meus_links[2]['title'] = 'Teste 3';
        $meus_links[2]['description'] = 'Desc 3';
        $meus_links[2]['image'] = 'Image 3';

        // Receberá todos os dados do XML
        $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';

        // A raiz do meu documento XML
        $xml .= '<links>';

        for ( $i = 0; $i < count( $meus_links ); $i++ ) {
            $xml .= '<link>';
            $xml .= '<id>' . $meus_links[$i]['id'] . '</id>';
            $xml .= '<title>' . $meus_links[$i]['title'] . '</title>';
            $xml .= '<description>' . $meus_links[$i]['description'] . '</description>';
            $xml .= '<image>' . $meus_links[$i]['image'] . '</image>';
            $xml .= '</link>';
        }

        $xml .= '</links>';

        // Escreve o arquivo
        $fp = fopen('../xml/a.xml', 'w+');
        fwrite($fp, $xml);
        fclose($fp);

    }
}
