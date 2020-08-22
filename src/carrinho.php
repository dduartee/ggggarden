<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

//adicionar produto
if (isset($_GET['acao'])) {
    //adicionar carrinho
    if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);

        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id] += 1;
        }
    }
    //remover carrinho
    if ($_GET['acao'] == 'del') {
        $id = intval($_GET['id']);

        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }
    if ($_GET['acao'] == 'delall') {
        if (isset($_SESSION['carrinho'])) {
            unset($_SESSION['carrinho']);
        }
    }
    //Atualizar tabela
    if ($_GET['acao'] == 'update') {
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd <> 0) {
                    $_SESSION['carrinho'][$id] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
    header('Location: carrinho.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Carrinho | GARDEN</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
    <h1>sem carrinho</h1>
<!--<body style="text-align: center;">
    <table style="width: 100%;">
        <caption>Carrinho de compras</caption>
        <thead>
            <tr>
                <th width="80">Produto</th>
                <th width="80">Quantidade</th>
                <th width="80">Preço</th>
                <th width="80">SubTotal</th>
                <th width="80">Remover</th>
            </tr>
        </thead>
        <form action="?acao=update" method="POST">
            <tfoot>
                <tr>
                    <td colspan="5"><input type="submit" value="Atualizar carrinho"></td>
                </tr>
                <tr>
                    <td colspan="5"><a href="index.php">Continuar comprando</a></td>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $total = 0;
                if (count($_SESSION['carrinho']) == 0) {
                    echo '<tr><td colspan="5">Carrinho vazio</td></tr>';
                } else {
                    require("conexao.php");
                    foreach ($_SESSION['carrinho'] as $id => $qtd) {
                        $sql = "SELECT * FROM produtos WHERE id='$id'";
                        $query = mysqli_query($link, $sql) or die(mysqli_error($link));
                        $array = mysqli_fetch_assoc($query);
                        $nome = $array['nome'];
                        $preco = number_format($array['preco'], 2, ',', '.'); // preco
                        $sub = number_format($array['preco'] * $qtd, 2, ',', '.'); // preco x qtd
                        $total += $array['preco'] * $qtd;
                ?>
                <tr>
                    <td><?php echo $nome ?></td>
                    <td><input type="text" size="3" name="prod[<?php echo $id ?>]" value="<?php echo $qtd ?>"></td>
                    <td><?php echo $preco ?></td>
                    <td><?php echo $sub ?></td>
                    <td><a href="?acao=del&id=<?php echo $id ?>">Remover</a></td>
                </tr>

                <?php } ?>
                <tr style="background-color: #dfdfdf;">
                    <td colspan="3">Total</td>
                    <td>R$ <?php echo $total; ?></td>
                    <td><a href="?acao=delall">Remover tudo</a></td>
                </tr>
            </tbody>
        </form>
        <?php } ?>
    </table>
</body>-->