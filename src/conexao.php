<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'garden_db');

$link = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Erro no banco de dados');