<?php
//Definindo quem pode acessar a API
header('Access-Control-Allow-Origin: *');

//Definindo o tipo de dados 
header('Content-type-application/json');

//Definindo o timezone
date_default_timezone_set("America/Sao_Paulo");

//Definindo formato da url
// $path  = explode("/", $_GET['path']);
if (isset($_GET['path'])) {
    $path = explode("/", $_GET['path']);
} else {
    echo "Rota inexistente!";
    exit;
}

//Verificando rota da url
if (isset($path[0])) {
    $api = $path[0];
} else {
    echo "Rota inexistente!";
    exit;
}

//Verificando ação da url
if (isset($path[1])) {
    $acao = $path[1];
} else {
    $acao = "";
}

//Verificando parâmetro da url
if (isset($path[2])) {
    $parametro = $path[2];
} else {
    $parametro = "";
}

//Para retornar o metodo da requisição
$method = $_SERVER['REQUEST_METHOD'];

include_once 'api/clientes/index.php';




