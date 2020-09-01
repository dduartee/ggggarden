    <?php
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
        <link rel='stylesheet' type='text/css' media='screen' href='/public/css/carrinho.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='/public/css/header.css'>

        <link rel="icon" href="img/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body style="background-color: #f6f6f6;">
        <?php require 'header.php' ?>
        <main class="page">
            <section class="shopping-cart dark">
                <div class="container">
                    <div class="block-heading">
                        <h2>Carrinho de compras</h2>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="items">
                                    <div class="product">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="img-fluid mx-auto d-block image" src="/public/img/<?php echo $imagem ?>.jpg">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-md-5 product-name">
                                                            <div class="product-name">
                                                                <a href="#"><?php echo $nome ?></a>
                                                                <div class="product-info">
                                                                    <div>Tamanho<span class="value"><?php echo $tamanho ?></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 quantity">
                                                            <label for="quantity">Quantity:</label>
                                                            <input id="quantity" type="number" value="1" class="form-control quantity-input">
                                                        </div>
                                                        <div class="col-md-3 price">
                                                            <span>$120</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="summary">
                                    <h3>Summary</h3>
                                    <div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>
                                    <div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
                                    <div class="summary-item"><span class="text">Shipping</span><span class="price">$0</span></div>
                                    <div class="summary-item"><span class="text">Total</span><span class="price">$360</span></div>
                                    <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
            var total = 0; // variável que retorna o total dos produtos que estão na LocalStorage.
        var i = 0; // variável que irá percorrer as posições
        var valor = 0; // variável que irá receber o preço do produto convertido em Float.

        for (i = 1; i <= 99; i++) // verifica até 99 produtos registrados na localStorage
        {
            var prod = localStorage.getItem("produto" + i + ""); // verifica se há recheio nesta posição. 
            if (prod != null) {
                // exibe os dados da lista dentro da div itens
                document.getElementById("itens").innerHTML += localStorage.getItem("qtd" + i) + " x ";
                document.getElementById("itens").innerHTML += localStorage.getItem("produto" + i);
                document.getElementById("itens").innerHTML += " ";
                document.getElementById("itens").innerHTML += "R$: " + localStorage.getItem("valor" + i) + "<hr>";

                // calcula o total dos recheios
                valor = parseFloat(localStorage.getItem("valor" + i)); // valor convertido com o parseFloat()
                total = (total + valor); // arredonda para 2 casas decimais com o .toFixed(2)
            }
        }
        // exibe o total dos recheios
        document.getElementById("total").innerHTML = total.toFixed(2);
    </script>
    </body>

    </html>