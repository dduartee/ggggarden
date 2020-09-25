<!DOCTYPE html>
<html>

<head>
    <title>Shop | GARDEN</title>
    <link rel='stylesheet' type='text/css' media='screen' href='/public/css/index.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/public/css/header.css'>
    <?php require 'head.php' ?>
    <style>
    .mol:hover {
        animation: vibrate-1 .5s linear infinite both;
    }
    </style>
</head>

<body>
    <center>
        <?php require 'header.php' ?>
        <p class="slogan">isso não é uma planta, é o jardim inteiro</p><br><br>
        <div class="roww">
            <?php
            $sql = "SELECT * FROM produtos";
            $query = mysqli_query($link, $sql) or die(mysqli_error($link));
            while ($array = mysqli_fetch_assoc($query)) {
                $imagens = explode(', ', $array['imagem']); ?>
            <div class="coll">
                <a href='<?php echo $array["uri"] ?>'>
                    <img class="mol" src="/public/img/<?php echo $imagens[0] ?>">
                </a>
            </div>
            <?php } ?>
        </div>
        <script>
        function ocultarPesquisa() {
            if (document.getElementById("search-box").style.display == 'none') {
                $("#search-box").animate({
                    width: '0px'
                }, 200, function() {
                    document.getElementById("search-box").style.display = "block";
                })
                $("#search-box").animate({
                    width: '178px'
                }, 200, function() {
                    document.getElementById("search-box").style.display = "block";
                })
            } else {
                $("#search-box").animate({
                    width: '0px'
                }, 200, function() {
                    document.getElementById("search-box").style.display = "none";
                })
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
        $('#account').click(function() {
            location.href = '/account';
        });
        $('#carrinho').click(function() {
            location.href = '/carrinho';
        });
        </script>
</body>

</html>