<?php
$cart = 'carrinho.php';
print render($cart, array('nome' => $nome, 'token' => $token, 'link' => $link));
die();