<?php

/*
 *Arquivo de Rotas
*/

//Rotas Zap
$router->get("/zap/gerarXml", function(){
    $controller = new App\Http\Controllers\ZapController();
    return $controller->gerarXml();
});

//Rotas OLX
$router->get("/olx/gerarXml", function(){
    $controller = new App\Http\Controllers\OlxController();
    return $controller->gerarXml();
});

//Rotas ImovelWeb
$router->get("/imovelweb/gerarXml", function(){
    $controller = new App\Http\Controllers\ImovelWebController();
    return $controller->gerarXml();
});

//Rotas Mercado Livre
$router->get("/mercadolivre/gerarXml", function(){
    $controller = new App\Http\Controllers\MercadoLivreController();
    return $controller->gerarXml();
});