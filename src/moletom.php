<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Moletom "ALUMINUM" - GARDEN</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/public/css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/public/css/header.css'>
    <link rel="icon" href="/public/img/logo.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <center>
        <div class="header">
            <div class="item">
                <img src="/public/img/search.png" class="search-icon">
                <input type="text" class="search-box" id="search-box" style="display: block;" length="100" placeholder="Pesquisar">
            </div>
            <div class="item">
                <a href="/"><img class="logo" src="/public/img/logo.png"></a>
            </div>
            <div class="item">
                <a href="/carrinho"><img class="carrinho" src="/public/img/carrinho.png"></a>
            </div>
            <br>
        </div>
        <div class="roww">
            <div class="coll">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/public/img/<?php echo $imagem; ?>" class="d-block w-100">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-image: url(&quot;data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e&quot;);" data:image="" svg+xml,%3csvg="" xmlns="http://www.w3.org/2000/svg" fill="%23000" width="8" height="8" viewbox="0 0 8 8" %3e%3cpath="" d="M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z" %3e%3c="" svg%3e")="" "=""></span>
            <span class=" sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-image: url(&quot;data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e&quot;);"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="coll" style="margin-left: 0px;">
                <span class="tituloproduto"><?php print $nome; ?></span><br><br><br>
                <form method="POST">
                    <p>Por favor, selecione o tamanho: </p>
                    <input type="radio" id="P" name="tamanho" value="P">
                    <label for="P">P</label><br>
                    <input type="radio" id="M" name="tamanho" value="M">
                    <label for="M">M</label><br>
                    <input type="radio" id="G" name="tamanho" value="G">
                    <label for="G">G</label><br>
                    <input type="radio" id="GG" name="tamanho" value="GG">
                    <label for="GG">GG</label><br><br>
                    <button type="submit" class="btn btn-dark" style="width: 100%;" name="enviar">Comprar com
                        PagSeguro</button>
                </form>
            </div>
        </div>
        <br>
        <?php
        if (isset($_POST['enviar'])) {
            $tamanho = $_POST['tamanho'];
            $id = '8';
            if ($id == 8) { //CINZA
                if ($tamanho == 'P') {
        ?><script>
                        window.location.href = "https://pag.ae/7W1KbetYM"
                    </script><?php
                            } else {
                                if ($tamanho == 'M') {
                                ?><script>
                            window.location.href = "https://pag.ae/7W1Kcd9g6"
                        </script><?php
                                } else {
                                    if ($tamanho == 'G') {
                                    ?><script>
                                window.location.href = "https://pag.ae/7W1KcEBS4"
                            </script><?php
                                    } else {
                                        if ($tamanho == 'GG') {
                                        ?><script>
                                    window.location.href = "https://pag.ae/7W1Kd29NH"
                                </script><?php
                                        } else {
                                            ?><script>
                                    alert('Selecione o tamanho do produto!');
                                </script><?php
                                        }
                                    }
                                }
                            }
                        }
                    }
                                            ?>
        <h2></h2>
        <p></p>
        </div>
        <script>
            function ocultarPesquisa(x) {
                if (x.matches) {
                    document.getElementById("search-box").style.display = "none";
                } else {
                    document.getElementById("search-box").style.display = "block";
                }
            }
            var x = window.matchMedia("(max-width: 700px)");
            ocultarPesquisa(x);
            x.addListener(ocultarPesquisa)
        </script>