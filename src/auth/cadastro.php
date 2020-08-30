<?php
session_start();
if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
}
require 'src/template-render.php';
$p1 =  'cadastrop1.php';
$error =  __DIR__ . '/../template-error.php';
$parte = '1';
if (isset($_GET['p'])) { // se tiver o p
    $parte = $_GET['p'];
    if ($parte == '1') {
        $parte = '1';
    } else if ($parte == '2') {
        if (!isset($_POST['nome'], $_POST['email'])) { //pulou parte 1
            $parte = '1';
            $aviso = 'Conclua a primeira parte do cadastro';
            print render($p1, array('aviso' => $aviso));
            die();
        } else if (isset($_POST['nome'], $_POST['email'])) {
            $parte = '2';
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            //renderiza a pagina denovo com a parte dos enderecos
        } else {
            print render($error, array('error' => 'Erro de cadastro, contate um administrador', 'code' => '130')); //parametros POST invalidos
            die();
        }
    } else {
        print render($error, array('error' => 'Parâmetro de cadastro inválido, contate um administrador', 'code' => '131')); //parametro GET "parte" invalida
        die();
    }
} else {
    if (isset($_POST['enviar'])) {

        foreach ($_POST as $key => $value) { //verificacao
            if (!$value || $value == NULL) {
                $parte = '1';
                $aviso = 'Preencha todos os campos';
                print render($p1, array('aviso' => $aviso));
                die();
            }
        }
        //conectar
        require __DIR__ . '/../conexao.php';
        //variaveis
        $nome = mysqli_real_escape_string($link, $_POST['nome']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $senha = md5(mysqli_real_escape_string($link, $_POST['senha']));
        $confirmarsenha = md5(mysqli_real_escape_string($link, $_POST['confirmarsenha']));
        $numero = mysqli_real_escape_string($link, $_POST['numero']);
        $endereco = mysqli_real_escape_string($link, $_POST['endereco']);
        $bairro = mysqli_real_escape_string($link, $_POST['bairro']);
        $cep = mysqli_real_escape_string($link, $_POST['cep']);
        $estado = mysqli_real_escape_string($link, $_POST['estado']);
        $cpf = mysqli_real_escape_string($link, $_POST['cpf']);
        //comandos
        $sql_verificar = "SELECT email FROM usuarios WHERE email='$email'"; // verificar se usuario ja existe
        $query_verificar = mysqli_query($link, $sql_verificar);
        $array_verificar = mysqli_fetch_array($query_verificar); // retorna o email de verificação
        //TODO
        if (isset($array_verificar['email'])) {
            $parte = '1';
            unset($_SESSION['aviso']);
            $aviso = 'Usuário já está cadastrado';
            $_SESSION['aviso'] = $aviso;
        } else if ($senha != $confirmarsenha) {
            $parte = '1';
            unset($_SESSION['aviso']);
            $aviso = 'Senhas não conferem';
            $_SESSION['aviso'] = $aviso;
        } else {
            $sql_cadastrar = "INSERT INTO usuarios (nome,email,senha,numero,endereco,bairro,cep,estado,cpf) VALUES ('$nome', '$email', '$senha', '$numero', '$endereco', '$bairro', '$cep', '$estado', '$cpf')";
            $query_cadastrar = mysqli_query($link, $sql_cadastrar);
            if ($query_cadastrar) {
                $parte = null;
                unset($_SESSION['aviso']);
                $aviso = 'Cadastrado com sucesso, por favor, faça o login';
                $_SESSION['aviso'] = $aviso;
                header('Location: /auth/login');
            }
            die();
        }
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='/public/css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/public/css/header.css'>
    <link rel="icon" href="/public/img/logo.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>garden | Cadastro</title>
</head>

<body>
    <div class="formulario">
        <?php
        if ($parte == '1') {
        ?>
            <form method="POST" action="?p=2">
                <input class="input-form" type="text" name="nome" placeholder="Nome" required>
                <input class="input-form" type="email" name="email" placeholder="E-mail" required>
                <input class="input-button-1" type="submit" name="enviar" value="Prosseguir">
                <a href="login.php"><input class="input-button-2" type="button" value="Entrar na minha conta"></a>
            </form>
        <?php } else  if ($parte == '2') { ?>
            <form method="POST" action="/auth/cadastro">
                <input class="input-form" type="text" name="nome" placeholder="Nome" required value="<?php echo $nome ?>" readonly>
                <input class="input-form" type="email" name="email" placeholder="E-mail" required value="<?php echo $email ?>" readonly>
                <input class="input-form" type="number" name="numero" placeholder="Número" required>
                <input class="input-form" type="text" name="endereco" placeholder="Endereço" required>
                <input class="input-form" type="text" name="bairro" placeholder="Bairro" required>
                <input class="input-form" type="text" name="cep" placeholder="CEP" required>
                <input class="input-form" type="text" name="estado" placeholder="estado" required>
                <input class="input-form" type="text" name="cpf" placeholder="CPF" required>
                <input class="input-form" type="password" name="senha" placeholder="Senha" required>
                <input class="input-form" type="password" name="confirmarsenha" placeholder="Confirme a sua senha" required>
                <input class="input-button-1" type="submit" name="enviar" value="Cadastrar">
                <input class="input-button-1" type="button" value="Voltar" onclick="window.location.href='?p=1'">
            </form>
        <?php } ?>
    </div>
    <script src="/public/js/notiFire.js"></script>
    <?php if (isset($_SESSION['aviso'])) { ?>
        <script>
            notifire({
                msg: '<?php echo $_SESSION['aviso'] ?>',
                types: 'warning',
                color: 'black',
                timeout: 1000
            });
        </script>
    <?php unset($_SESSION['aviso']);
    } ?>
</body>

</html>