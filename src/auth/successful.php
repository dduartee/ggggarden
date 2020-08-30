<?php 
require __DIR__.'/../template-render.php';
$error =  __DIR__.'/../template-error.php';
print render($error, array('error' => 'Login realizado com sucesso', 'code' => '')); // página de template não existe
die();