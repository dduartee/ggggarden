<?php
$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
require 'template-render.php';
require 'conexao.php';
//echo __DIR__;
$moletom = __DIR__.'/moletom.php';
$camiseta = __DIR__.'camiseta.php';
$output = '';
$nome = $request[1];

function renderItem($nome, $link) {
    $sql = "SELECT * FROM produtos WHERE nome='$nome'";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $array = mysqli_fetch_assoc($query);
    //var_dump($array);
    return $array;
}
//var_dump($request);
switch ($request[0]) {
    case 'moletom':
        print template($moletom, renderItem($nome, $link));
        break;
    case 'camiseta':
        print template($camiseta, renderItem($nome, $link));
        break;
    default:
        echo "../404.php";
        break;
}
