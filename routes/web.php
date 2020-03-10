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
$router->post("/zap/gerarXml", function(){
    $controller = new App\Http\Controllers\ZapController();
    return $controller->gerarXml();
});

$router->post("/viva/gerarXml", function(){
    $controller = new App\Http\Controllers\VivaController();
    return $controller->gerarXml();
});