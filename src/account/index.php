<?php
require 'cart/cartfunctions.php';
$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
$info = 'info.php';
$error =  __DIR__ .'/../template-error.php';
$carrrinho = __DIR__.'/cart/carrinho.php';
$output = '';

if(isset($_COOKIE['auth'])) {
    [$validacao, $nome, $token, $email, $id] = validarToken($_COOKIE['auth'], $link);
    if(!$validacao) {
        print render($error, array('error' => 'Acesso negado, entre em uma conta', 'code' => '140'));
        die();
    }
} else {
    print render($error, array('error' => 'Acesso negado, entre em uma conta', 'code' => '141'));
    die();
}

switch ($request[1]) {
    default:
        # code...
        break;
}