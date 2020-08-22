<?php
session_start();
if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input class="input-login" type="email" name="email" placeholder="E-mail" required>
    <input class="input-login" type="password" name="senha" placeholder="Senha" required>
</body>
<?php
if (isset($_POST['enviar'])) {
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    if (!$email || $email == NULL || !$senha || $senha == NULL) {
        echo "<script>alert('Preencha todos os campos');</script>";
    }
    //conexão
    require '../conexao.php'
    
    $sql_logar = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $query_logar = mysqli_query($connect, $sql_logar);
    $array_logar = mysqli_fetch_array($query_logar);
    if (mysqli_num_rows($query_logar) <= 0) {
        echo "<script>alert('Login e/ou senha incorretos')</script>";
        die();
    } else { // login sucesso
        session_destroy();
        session_start();
        $_SESSION['login'] = $array_logar['id'];
        header('Location: index.php');
    }
}
?>
</html>