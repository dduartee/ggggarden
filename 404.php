<!DOCTYPE html>

<html>



<head>

    <meta charset='utf-8'>

    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <title>404 - GARDEN</title>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel='stylesheet' type='text/css' media='screen' href='/public/css/index.css'>
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
                <img src="/public/img/search.png" class="search-icon" onclick="ocultarPesquisa()">
                <input type="text" class="search-box" id="search-box" style="display: block;" length="100" placeholder="Pesquisar">
            </div>
            <div class="item">
                <a href="/"><img class="logo" src="/public/img/logo.png"></a>
            </div>
            <div class="item">
                <a href="/carrinho/"><img class="carrinho" src="/public/img/carrinho.png"></a>
            </div>
            <br>
        </div>
        <p class="slogan">isso não é uma planta, é o jardim inteiro</p><br><br>
        <h1>Página não encontrada.</h1><br><br>
        <h1><a href="/">Voltar para a página inicial</a></h1>
        <script>
            function ocultarPesquisa() {
                if (document.getElementById("search-box").style.display == 'none') {
                    document.getElementById("search-box").style.display = "block";
                } else {
                    document.getElementById("search-box").style.display = "none";
                }
            }

            function ocultarPesquisaAuto(x) {
                if (x.matches) {
                    document.getElementById("search-box").style.display = "none";
                } else {
                    document.getElementById("search-box").style.display = "block";
                }
            }
            var x = window.matchMedia("(max-width: 700px)");
            ocultarPesquisaAuto(x);
            x.addListener(ocultarPesquisaAuto)
        </script>
</body>



</html>