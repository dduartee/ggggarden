<?php


$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
switch ( $request[1] ) {
    case 'login' :
        require 'login.php';
    break;
    case 'cadastro' :
        require 'cadastro.php';
    break;
    case 'cadastro?p=1' :
        require 'cadastro.php';
    break;
    case 'cadastro?p=2' :
        require 'cadastro.php';
    break;
    default:
    require __DIR__.'/../template-render.php';
    $error =  __DIR__.'/../template-error.php';

    print render($error, array('error' => 'Página não existe', 'code' => '404'));
    die();
    break;

}
