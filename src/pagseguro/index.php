<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <?php require __DIR__ . '/../head.php'; ?>
    <link rel="stylesheet" href="/public/css/index.css">

</head>

<body>
    <?php require __DIR__ . '/../header.php'; ?>

    <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
    <form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
        <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
        <input type="hidden" name="code" value="EFE814B450504A3EE419BF872F9FBE59" />
        <input type="hidden" name="iot" value="button" />
        <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-azul-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
    </form>
    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
</body>

</html>