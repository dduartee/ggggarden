    <?php

    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <title>Carrinho | GARDEN</title>
        <link rel='stylesheet' type='text/css' media='screen' href='/public/css/carrinho.css'>
        <?php require __DIR__ . '/../head.php'; ?>
    </head>

    <body>
        <?php require __DIR__ . '/../header.php' ?>
        <h1>Shopping Cart</h1>
        <button id="clear-cart">Clear Cart</button>
        <div>
            <ul id="show-cart">
                <?php
                $content = cartContent($link, $nome, $email, $id);
                $item = explode(', ', $content);
                for ($i = 0; $i < sizeof($item); $i++) { ?>
                    <li><?php echo $item[$i]; ?></li>
                <?php } ?>
            </ul>
            <div>You have <span id="count-cart">X</span> items in your cart</div>
            <div>Total Cart:$<span id="total-cart"></span></div>
        </div>
    </body>

    </html>