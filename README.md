# anuncios
Gateway de anuncios imobiliarios

## endpoint /zap/gerarXml
**Chamado por método GET**
Esse endpoint faz a geração do XML no padrão definido pela Zap Imóveis. O XML é salvo em:
*/xml/zap/IntegracaoSellf.xml*

**Retorno do endpoint**
Em caso de geração OK do arquivo, o seguinte retorno é informado:
*{*
    *"codigo":"200",*
    *"mensagem":"Arquivo IntegracaoSellf.xml criado com Sucesso!"*
*}*
Em caso de erro, é retornado o seguinte jSON:
*{*
    *"codigo":"500",*
    *"mensagem":"Ocorreu um erro ao tentar criar o arquivo!"*
*}*


## endpoint /olx/gerarXml
**Chamado por método GET**
Esse endpoint faz a geração do XML no padrão definido pela OLX. O XML é salvo em:
*/xml/olx/IntegracaoSellf.xml*

**Retorno do endpoint**
Em caso de geração OK do arquivo, o seguinte retorno é informado:
*{*
    *"codigo":"200",*
    *"mensagem":"IntegracaoSellf.xml criado com Sucesso!"*
*}*
Em caso de erro, é retornado o seguinte jSON:
*{*
    *"codigo":"500",*
    *"mensagem":"Ocorreu um erro ao tentar criar o arquivo!"*
*}*


## endpoint /imovelweb/gerarXml
**Chamado por método GET**
Esse endpoint faz a geração do XML no padrão definido pela Imóvel Web. O XML é salvo em:
*/xml/olx/IntegracaoSellf.xml*

**Retorno do endpoint**
Em caso de geração OK do arquivo, o seguinte retorno é informado:
*{*
    *"codigo":"200",*
    *"mensagem":"Arquivo iw_ofertas.xml criado com Sucesso!"*
*}*
Em caso de erro, é retornado o seguinte jSON:
*{*
    *"codigo":"500",*
    *"mensagem":"Ocorreu um erro ao tentar criar o arquivo!"*
*}*