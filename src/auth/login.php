<?php
session_start();
session_destroy();
unset($_SESSION['nome']);
if (isset($_POST['entrar'])) {
    foreach ($_POST as $key => $value) {
        if (!$value || $value == NULL) {
            unset($_SESSION['aviso']);
            $aviso = 'Preencha todos os campos';
            $_SESSION['aviso'] = $aviso;
            header('Location: /auth/login');
            die();
        } //verificacao
    }
    //conexão
    require __DIR__ . '/../conexao.php';
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $senha = md5(mysqli_real_escape_string($link, $_POST['senha']));
    $sql_logar = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $query_logar = mysqli_query($link, $sql_logar);
    $array_logar = mysqli_fetch_array($query_logar);
    if (!isset($array_logar['email'])) {
        unset($_SESSION['aviso']);
        $aviso = 'Preencha todos os campos';
        $_SESSION['aviso'] = $aviso;
        header('Location: /auth/login');
        die();
    } else { // login sucesso
        require 'gerar-token.php';
        $token = gerarToken($array_logar['id'], $array_logar['nome'], $array_logar['email']);
        echo '<script>localStorage.setItem("token_jwt","'.$token.'");</script>';
        echo '<script>location.href="/auth/successful";</script>';
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | GARDEN</title>
    <script src="/public/js/jquery-3.5.1.min.js"></script>
    <script>
        localStorage.removeItem('token_jwt');
    </script>
</head>

<body>
    <form id="formlogin" method="POST">
        <input class="input-form" type="email" name="email" id="email" placeholder="E-mail" required>
        <input class="input-form" type="password" name="senha" id="senha" placeholder="Senha" required>
        <input type="submit" name="entrar" value="Entrar">
    </form>
    <script src="/public/js/notiFire.js"></script>
    <?php if (isset($_SESSION['aviso'])) { ?>
        <script>
            notifire({
                msg: '<?php echo $_SESSION['aviso']; unset($_SESSION['aviso']); ?>',
                types: 'warning',
                color: 'black',
                timeout: 1000
            });
        </script>
    <?php } ?>
</body>

</html>