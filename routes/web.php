<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//Rotas Zap e VivaReal
$router->get("/zap/gerarXml", function(){
    $controller = new App\Http\Controllers\ZapController();
    return $controller->gerarXml();
});

$router->get("/viva/gerarXml", function(){
    $controller = new App\Http\Controllers\VivaController();
    return $controller->gerarXml();
});

$router->get("/olx/gerarXml", function(){
    $controller = new App\Http\Controllers\OlxController();
    return $controller->gerarXml();
});