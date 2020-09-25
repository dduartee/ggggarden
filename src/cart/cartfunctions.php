<?php
function cartContent($link, $nome, $email, $id)
{
    $nome = mysqli_escape_string($link, $nome);
    $email = mysqli_escape_string($link, $email);
    $sql_cart = "SELECT nome, email, user_id, conteudo from carrinho WHERE nome='{$nome}' email='{$email}' user_id='{$id}';";
    $query_cart = mysqli_query($link, $sql_cart);
    if (!$query_cart) {
        createCart($link, $nome, $email, $id); // cria carrinho
        cartContent($link, $nome, $email, $id); // tenta exibir novamente
        return 1;
    } else {
        $array_cart = mysqli_fetch_array($query_cart);
        return $array_cart['conteudo'];
    }
}
function createCart($link, $nome, $email, $id)
{
    $sql_createcart = "INSERT INTO carrinho (nome, email, user_id) VALUES ('{$nome}', '{$email}', '{$id}')";
    return mysqli_query($link, $sql_createcart);
}
function delCart($link, $nome, $email, $id)
{
    $sql_delcart = "DELETE FROM carrinho (nome, email, user_id, conteudo) VALUES ('{$nome}', '{$email}', '{$id}', '')";
    return mysqli_query($link, $sql_delcart);
}
function modifyCart($link, $email, $id, $content)
{
    verifyItems($link, $content);
    $sql_modifyCart = "UPDATE carrinho SET conteudo= '{$content}' WHERE email='{$email}' AND user_id='{$id}'";
    return mysqli_query($link, $sql_modifyCart);
}
function verifyItems($link, $content) 
{
    $item = explode(', ', $content);
    foreach ($item as $nome) {
        $sql_verifyItem = "SELECT nome FROM produtos WHERE nome='{$nome}'";
        if (!mysqli_query($link, $sql_verifyItem)) {
            $item = null;
            break;
        }
    }
    return $item;
}
