<?php
session_start();
echo $_SESSION['nome'];
require 'src/auth/enviar-token.php';
require 'src/auth/verificar-token.php';
$token = enviarToken();
$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
switch ($request[0]) {
    case '/':
        require 'home.php';
        break;
    case '':
        require 'home.php';
        break;
    case 'produtos':
        require 'src/produtos/index.php';
        break;
    case 'auth':
        require 'src/auth/index.php';
        break;
    case 'carrinho':
        require 'carrinho.php';
    break;
    default:
        require 'src/template-render.php';
        $error =  'src/template-error.php';

        print render($error, array('error' => 'Página não existe', 'code' => '404'));
        die();
        break;
}
