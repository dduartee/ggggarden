<?php
session_start();
require 'src/auth/tokenfunctions.php';
require 'src/template-render.php';
require 'src/conexao.php';
$home = 'src/home.php';
header('Content-type: text/html; charset=utf-8');

if (isset($_COOKIE['auth'])) {
    [$validacao, $nome, $token] = validarToken($_COOKIE['auth'], $link);
} else {
    $nome = null;
    $token = null;
    $validacao = 0;
}
$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
switch ($request[0]) {
    case '/':
        print render($home, array('nome' => $nome, 'token' => $token, 'link' => $link));
        break;
    case '':
        print render($home, array('nome' => $nome, 'token' => $token, 'link' => $link));
        break;
    case 'shop':
        print render('src/shop.php', array('nome' => $nome, 'token' => $token, 'link' => $link));
        break;
    case 'lookbook':
        print render('src/lookbook.php', array('nome' => $nome, 'token' => $token, 'link' => $link));
        break;
    case 'produtos':
        print render('src/produtos/index.php', array('nome' => $nome, 'token' => $token, 'link' => $link));
        break;
    case 'auth':
        removerCookie('auth');
        require 'src/auth/index.php';
        break;
    case 'account':
        require 'src/account/index.php';
        break;
    case 'cart':
        if($validacao) {
            print render('src/cart/index.php', array('nome' => $nome, 'token' => $token, 'link' => $link));
        } else {
            print render($error, array('error' => 'Faça login para acessar o carrinho', 'code' => '152'));
        }
        break;
    case 'pagamento':
        require 'src/pagseguro/index.php';
        break;
    default:
        $error =  'src/template-error.php';
        print render($error, array('error' => 'Página não existe', 'code' => '404'));
        die();
        break;
}
die();
