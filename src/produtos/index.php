<?php
$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
//require __DIR__.'/../template-render.php';
//require __DIR__.'/../conexao.php';
$template = __DIR__ . '/template-produto.php';
$error =  __DIR__ .'/../template-error.php';
$output = '';
$uri = strtolower(substr($_SERVER['REQUEST_URI'], 1)); // 1 moletom/camiseta :/: 2 nome
[$validacao, $nome, $token] = validarToken($_COOKIE['auth'], $link);
function renderItem($uri, $link) {
    $sql = "SELECT * FROM produtos WHERE uri='$uri'"; // selecione tudo de produtos onde uri é igual a uri recebida
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    $array = mysqli_fetch_array($query);
    return $array;
}
if (!renderItem($uri, $link)) {
    print render($error, array('error' => 'Página não existe', 'code' => '120')); // produto recebido pela url não foi encontrado pelo banco de dados
    die();
} else if (!render($template, renderItem($uri, $link))) {
    print render($error, array('error' => 'Erro interno, contate um administrador', 'code' => '121')); // página de template não existe
    die();
} else {
    $args = array(renderItem($uri, $link), 'nome' => $nome, 'token' => $token);
    //var_dump($args);
    print render($template, $args) ;
}
