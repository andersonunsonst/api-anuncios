<?php

namespace App\Http\Controllers;
use App\Libraries\Helpers;
use App\Model\Imoveis;

class ZapController extends Controller
{
    public function gerarXml(){
        $teste = Imoveis::getImoveisZapSellf();
        var_dump($teste);
        exit;
        //esse array deverá ser recebido como parametro da rota, esta declaração é apenas um exemplo
        $dadosImovel = array();             
        $dadosImovel[0]['TipoImovel'] = 'Apartamento';           
        $dadosImovel[0]['CodigoImovel'] = 'ABC123';        
        $dadosImovel[0]['SubTipoImovel'] = 'Apartamento Padrão';       
        $dadosImovel[0]['CategoriaImovel'] = 'Padrão';     
        $dadosImovel[0]['UF'] = 'RJ';                  
        $dadosImovel[0]['Cidade'] = 'Rio de Janeiro';              
        $dadosImovel[0]['Bairro'] = 'Barra da Tijuca';              
        $dadosImovel[0]['Numero'] = '100';              
        $dadosImovel[0]['Complemento'] = 'ap. 13';         
        $dadosImovel[0]['CEP'] = '11586900';                
        $dadosImovel[0]['Endereco'] = '';            
        $dadosImovel[0]['PrecoVenda'] = '145000';         
        $dadosImovel[0]['PrecoLocacao'] = '';  
        $dadosImovel[0]['PrecoLocacaoTemporada'] = ''; 
        $dadosImovel[0]['PrecoCondominio'] = '';
        $dadosImovel[0]['AreaUtil'] = '56';     
        $dadosImovel[0]['AreaTotal'] = '56';    
        $dadosImovel[0]['UnidadeMetrica'] = ''; 
        $dadosImovel[0]['QtdDormitorios'] = '4';
        $dadosImovel[0]['QtdSuites'] = '';       
        $dadosImovel[0]['QtdBanheiros'] = '';       
        $dadosImovel[0]['QtdSalas'] = '';        
        $dadosImovel[0]['QtdVagas'] = '';        
        $dadosImovel[0]['QtdElevador'] = '';     
        $dadosImovel[0]['QtdUnidadesAndar'] = '';
        $dadosImovel[0]['QtdAndar'] = '';               
        $dadosImovel[0]['QtdPessoasParaTemporada'] = '';
        $dadosImovel[0]['ValorIPTU'] = '';              
        $dadosImovel[0]['AnoConstrucao'] = '';          
        $dadosImovel[0]['PossuiDivida'] = '';            
        $dadosImovel[0]['SaldoDivida'] = '';            
        $dadosImovel[0]['ValorMensalidadeDivida'] = '';  
        $dadosImovel[0]['QtdParcelasRestantesDivida'] = '';
        $dadosImovel[0]['Observacao'] = '';              
        $dadosImovel[0]['DataUltimaParcelaDivida'] = ''; 
        $dadosImovel[0]['DiaVencimentoDivida'] = '';     
        $dadosImovel[0]['AceitaPermuta'] = '';            
        $dadosImovel[0]['AceitaPermutaCarro'] = '';      
        $dadosImovel[0]['AceitaPermutaImovel'] = '';     
        $dadosImovel[0]['AceitaPermutaOutro'] = '';      
        $dadosImovel[0]['ValorPermutaCarro'] = '';       
        $dadosImovel[0]['ValorPermutaImovel'] = '';      
        $dadosImovel[0]['ValorPermutaOutro'] = '';     
        $dadosImovel[0]['DescricaoPermuta'] = '';        
        $dadosImovel[0]['Acesso24Horas'] = '';           
        $dadosImovel[0]['Agua'] = '';                    
        $dadosImovel[0]['ArCondicionado'] = '';           
        $dadosImovel[0]['ArmarioCozinha'] = '';          
        $dadosImovel[0]['ArmarioEmbutido'] = '';         
        $dadosImovel[0]['BusinessCentar'] = '';          
        $dadosImovel[0]['Cerca'] = '';                   
        $dadosImovel[0]['Churrasqueira'] = '';           
        $dadosImovel[0]['CoffeeShop'] = '';              
        $dadosImovel[0]['Convencoes'] = '';              
        $dadosImovel[0]['Copa'] = '';                    
        $dadosImovel[0]['EntradaCaminhoes'] = '';        
        $dadosImovel[0]['Escritorio'] =  '';             
        $dadosImovel[0]['EscritorioVirtual'] = '';      
        $dadosImovel[0]['Esgoto'] = '';                 
        $dadosImovel[0]['Esquina'] = '';                
        $dadosImovel[0]['EstacionamentoRotativo'] = '';  
        $dadosImovel[0]['EstacionamentoVisitantes'] = '';
        $dadosImovel[0]['EstradaAsfaltada'] = '';        
        $dadosImovel[0]['GaragemBarcos'] = '';               
        $dadosImovel[0]['Guarita'] = '';                     
        $dadosImovel[0]['Heliponto'] = '';                   
        $dadosImovel[0]['InfraInternet'] = '';                      
        $dadosImovel[0]['Jardim'] = '';                             
        $dadosImovel[0]['Lago'] = '';                               
        $dadosImovel[0]['Lavoura'] = '';                            
        $dadosImovel[0]['Luz'] = '';                         
        $dadosImovel[0]['Marina'] = '';                      
        $dadosImovel[0]['Mezanino'] = '';                    
        $dadosImovel[0]['Pasto'] = '';                       
        $dadosImovel[0]['PatioEstacionamento'] = '';         
        $dadosImovel[0]['Pier'] = '';                        
        $dadosImovel[0]['Piscina'] = '';                    
        $dadosImovel[0]['PisoElevado'] = '';                 
        $dadosImovel[0]['PistaPouso'] = '';                  
        $dadosImovel[0]['Playground'] = '';                  
        $dadosImovel[0]['PonteRolante'] = '';                
        $dadosImovel[0]['QuadraSquash'] = '';                
        $dadosImovel[0]['QuadraTenis'] = '';                 
        $dadosImovel[0]['QuadraPoliEsportiva'] = '';         
        $dadosImovel[0]['Quintal'] = '';                     
        $dadosImovel[0]['RedeTelefone'] = '';                
        $dadosImovel[0]['ReservatorioAgua'] = '';            
        $dadosImovel[0]['Restaurante'] = '';                 
        $dadosImovel[0]['Rio'] = '';                         
        $dadosImovel[0]['RuaAsfaltada'] = '';                
        $dadosImovel[0]['SalaGinastica'] = '';               
        $dadosImovel[0]['SalaoFestas'] = '';                 
        $dadosImovel[0]['SalaoJogos'] = '';                  
        $dadosImovel[0]['Sauna'] = '';                       
        $dadosImovel[0]['Sede'] = '';                        
        $dadosImovel[0]['SegurancaRua'] = '';                
        $dadosImovel[0]['SegurancaPatrimonial'] = '';        
        $dadosImovel[0]['Silos'] = '';                       
        $dadosImovel[0]['SistemaIncendio'] = '';             
        $dadosImovel[0]['Telefone'] = '';                    
        $dadosImovel[0]['TVCabo'] = '';                      
        $dadosImovel[0]['Varanda'] = '';                     
        $dadosImovel[0]['Vestiario'] = '';                   
        $dadosImovel[0]['VidrosReflexivos'] = '';       
        $dadosImovel[0]['WCEmpregada'] = '';  
        $dadosImovel[0]['QuartoWCEmpregada'] = '';  
        $dadosImovel[0]['Lavabo'] = '';  
        $dadosImovel[0]['EstudaPermuta'] = '';  
        $dadosImovel[0]['DepositoSubsolo'] = '';  
        $dadosImovel[0]['Closet'] = '';  
        $dadosImovel[0]['Hidromassagem'] = '';  
        $dadosImovel[0]['Lareira'] = '';  
        $dadosImovel[0]['FrenteMa'] = '';  
        $dadosImovel[0]['AndarInteiro'] = ''; 
        $dadosImovel[0]['AreaServico'] = ''; 
        $dadosImovel[0]['Bosque'] = ''; 
        $dadosImovel[0]['CampoFutebol'] = ''; 
        $dadosImovel[0]['CasaCaseiro'] = ''; 
        $dadosImovel[0]['CasaFundo'] = ''; 
        $dadosImovel[0]['CasaPrincipal'] = '';  
        $dadosImovel[0]['Caseiro'] = '';  
        $dadosImovel[0]['ComServico'] = '';  
        $dadosImovel[0]['CozinhaAzulejada'] = '';  
        $dadosImovel[0]['Despensa'] = '';  
        $dadosImovel[0]['EnergiaEletrica'] = '';  
        $dadosImovel[0]['EntradaServicoIndependente'] = '';  
        $dadosImovel[0]['EntradaFacilitada'] = '';  
        $dadosImovel[0]['EntradaLateral'] = '';  
        $dadosImovel[0]['Fogao'] = '';  
        $dadosImovel[0]['Freezer'] = '';  
        $dadosImovel[0]['Geladeira'] = '';  
        $dadosImovel[0]['Geminada'] = '';  
        $dadosImovel[0]['HomeTheater'] = '';  
        $dadosImovel[0]['ImovelExposicao'] = '';  
        $dadosImovel[0]['InterfonE'] = '';  
        $dadosImovel[0]['LavaRoupaS'] = ''; 
        $dadosImovel[0]['LavanderiaColetiva'] = '';  
        $dadosImovel[0]['Isolada'] = '';  
        $dadosImovel[0]['LivingTabuasLargas'] = '';  
        $dadosImovel[0]['MeioAndar'] = '';  
        $dadosImovel[0]['Microondas'] = '';  
        $dadosImovel[0]['Oferta'] = '';  
        $dadosImovel[0]['Paiol'] = '';  
        $dadosImovel[0]['ParaIncorporacao'] = '';       
        $dadosImovel[0]['PistaCooper'] = '';  
        $dadosImovel[0]['PistaSkate'] = '';  
        $dadosImovel[0]['Poco'] = '';  
        $dadosImovel[0]['PocoArtesiano'] = '';
        $dadosImovel[0]['PorteiraFechada'] = '';  
        $dadosImovel[0]['ProntoMorar'] = '';  
        $dadosImovel[0]['Refeitorio'] = '';  
        $dadosImovel[0]['RoupaBanho'] = ''; 
        $dadosImovel[0]['RoupaCama'] = '';  
        $dadosImovel[0]['RoupaMesa'] = '';  
        $dadosImovel[0]['SalaAlmoco'] = '';  
        $dadosImovel[0]['SalaJantar'] = '';  
        $dadosImovel[0]['SalaIntima'] = '';  
        $dadosImovel[0]['SalaVideo'] = '';  
        $dadosImovel[0]['SegurancaInterna'] = '';  
        $dadosImovel[0]['Semigeminada'] = '';  
        $dadosImovel[0]['SpaHidromassagem'] = '';  
        $dadosImovel[0]['StandVendasLocal'] = '';  
        $dadosImovel[0]['TV'] = '';  
        $dadosImovel[0]['UtensiliosCozinha'] = '';  
        $dadosImovel[0]['UtilizeFGTS'] = '';  
        $dadosImovel[0]['VentiladoresTeto'] = '';  
        $dadosImovel[0]['VisiteImovelDecorado'] = '';  
        $dadosImovel[0]['Clube'] = '';  
        $dadosImovel[0]['ChildrenCare'] = '';  
        $dadosImovel[0]['Curral'] = '';  
        $dadosImovel[0]['Mobiliado'] = '';  
        $dadosImovel[0]['Recuo'] = '';  
        $dadosImovel[0]['Solarium'] = ''; 
        $dadosImovel[0]['CasaMista'] = '';  
        $dadosImovel[0]['CasaAlvenaria'] = '';  
        $dadosImovel[0]['CasaMadeira'] = '';  
        $dadosImovel[0]['Terraco'] = '';  
        $dadosImovel[0]['TipoOferta'] = '1';  
        $dadosImovel[0]['ValorEntrada'] = '10.000';
        $dadosImovel[0]['ValorMensal'] = '5.000';	
        $dadosImovel[0]['InformacoesComplementares'] =  '';	  
        $dadosImovel[0]['DescricaoLocalizacao'] =  '';
        
        $dadosImovel[0]['Fotos'][0]['NomeArquivo'] =  'foto.jpg';
        $dadosImovel[0]['Fotos'][0]['URLArquivo'] =  'http://www.site.com.br/imagens/foto.jpg';
        $dadosImovel[0]['Fotos'][0]['Principal'] =  '1';
        $dadosImovel[0]['Fotos'][0]['Alterada'] =  '0';

        $dadosImovel[0]['Fotos'][1]['NomeArquivo'] =  'foto.jpg';
        $dadosImovel[0]['Fotos'][1]['URLArquivo'] =  'http://www.site.com.br/imagens/foto.jpg';
        $dadosImovel[0]['Fotos'][1]['Alterada'] =  '0';

        $dadosImovel[0]['Videos'][0]['Url'] =  'https://www.youtube.com/watch?v=zutvR8M2jUk';
        

        $nomeArquivo = "../zap/xml/".date("Y-m-d").".xml";

        $arquivo = fopen($nomeArquivo, 'w+');
        
        $conteudoArquivo = '<?xml version="1.0" encoding="UTF-8"?>';

        $conteudoArquivo .= '<Carga xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';

        $conteudoArquivo .= '<Imoveis>';
        $tagsAuxiliares = array(
            0 => 'Foto',
            1 => 'Video'
        );
        $tagsImovel = Helpers::arrayToXml('Imovel', $tagsAuxiliares, $dadosImovel);

        $conteudoArquivo .= $tagsImovel;

        $conteudoArquivo .= '</Imoveis>';
        
        $conteudoArquivo .= '</Carga>';
        var_dump($conteudoArquivo);
        exit;
        fwrite($arquivo, $conteudoArquivo);
        
        fclose($arquivo); 
    }
}
