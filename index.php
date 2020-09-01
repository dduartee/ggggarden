<?php
session_start();
require 'src/auth/tokenfunctions.php';
require 'src/auth/unsetCookie.php';
require 'src/template-render.php';
require 'src/conexao.php';
$home = 'src/home.php';
if(isset($_COOKIE['auth'])) {
    [$validacao, $nome, $token] = validarToken($_COOKIE['auth'], $link);
} else {
    $nome = null;
    $token = null;
    $validacao = 0;
}
/*if (isset($_COOKIE['auth'])) {
    [$validacao, $nome, $token] = validarToken($_COOKIE['auth'], $link);
    if(!$validacao) {
        $nome = null;
        $token = null;
        $validacao = 0;
    } else {
        $nome = $nome;
        $token = $token;
    }
} else {
    $nome = null;
    $token = null;
    $validacao = 0;
}
var_dump($nome);
var_dump($token);*/

$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
switch ($request[0]) {
    case '/':
        print render($home, array('nome' => $nome, 'token' => $token, 'link' => $link));
        break;
    case '':
        print render($home, array('nome' => $nome, 'token' => $token, 'link' => $link));
        break;
    case 'produtos':
        print render('src/produtos/index.php', array('nome' => $nome, 'token' => $token, 'link' => $link));
        //require 'src/produtos/index.php';
        break;
    case 'auth':
        unsetcookie('auth');
        echo 'cookie removido';
        var_dump($_COOKIE['auth']);
        require 'src/auth/index.php';
        break;
    case 'carrinho':
        require 'src/carrinho.php';
        break;
    case 'account':
        require 'src/account.php';
        break;
    default:
        $error =  'src/template-error.php';
        print render($error, array('error' => 'Página não existe', 'code' => '404'));
        die();
        break;
}
die();
