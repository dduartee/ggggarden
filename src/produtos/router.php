<?php
$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
require 'template-render.php';
require __DIR__.'/../conexao.php';
$template = __DIR__ . '/template-produto.php';
$error =  __DIR__ .'/../../404.php';
$output = '';
$uri = strtolower(substr($_SERVER['REQUEST_URI'], 1));

function renderItem($uri, $link) {
    $sql = "SELECT * FROM produtos WHERE uri='$uri'"; // selecione tudo de produtos onde uri é igual a uri recebida
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $array = mysqli_fetch_assoc($query);
    return $array;
}
if (!renderItem($uri, $link)) {
    print render($error, $uri);
    die();
}
if (!render($template, renderItem($uri, $link))) {
    print render($error, $uri);
    die();
}
print render($template, renderItem($uri, $link));
