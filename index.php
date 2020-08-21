<?php

$request = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));
switch ( $request[0] ) {
    case '/' :
    require 'home.php';
    break;
    case '' :
    require 'home.php';
    break;
    case 'moletom' :
        require 'src/router.php';
    break;
    case 'camiseta' :
        require 'src/router.php';
    break;
    case 'carrinho' :
        require 'carrinho.php';
    break;
    default:
        require '404.php';
    break;

}
