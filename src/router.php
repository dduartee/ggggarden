<?php
$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
require 'template-render.php';
require 'conexao.php';
$dir = strval(__DIR__);
$volta1 = substr($dir, 0, -4); // tira a uri /src/
$template = __DIR__ . '/template-produto.php';
$error =  $volta1 .'/404.php'; // __dir__ sem /src/
$output = '';
$uri = strtolower(substr($_SERVER['REQUEST_URI'], 1));
//echo $error;

function renderItem($uri, $link)
{
    $sql = "SELECT * FROM produtos WHERE uri='$uri'"; // selecione tudo de produtos onde uri é igual a uri recebida
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $array = mysqli_fetch_assoc($query);
    //var_dump($array);
    return $array;
}
if (!renderItem($uri, $link)) {
    print template($error, $uri);
    die();
} else {
    print template($template, renderItem($uri, $link));
    /*//var_dump($request);
    switch ($request[0]) {
        case 'moletom':
        break;
        case 'camiseta':
            print template($camiseta, renderItem($uri, $link));
            break;
        default:
            require '404.php';
            break;
    }*/
}
