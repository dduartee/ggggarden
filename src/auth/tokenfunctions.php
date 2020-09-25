<?php
function gerarToken()
{
    $id = md5(uniqid(mt_rand(), true));
    $token = sha1(uniqid(mt_rand() + time(), true));
    return array(
        $id,
        $token
    );
}
function gerarCookie($id, $token)
{
    $cookieToken = array(
        'i' => $id,
        't' => $token
    );
    return $cookieToken;
}
function removerCookie($cookie) {
    setcookie($cookie, null, time() - 3600, '/'); 
}
function validarToken($cookieAuth, $link)
{
    $tokenData = isset($cookieAuth) ? json_decode($cookieAuth, true) : false;
    if ($tokenData) {
        $id = mysqli_escape_string($link, $tokenData['i']);
        $token = mysqli_escape_string($link, $tokenData['t']);
        $sql_validar = "SELECT token_id, token, nome, email, id FROM usuarios WHERE token_id='{$id}'AND token='{$token}'";
        $query_validar = mysqli_query($link, $sql_validar);
        if ($query_validar) {
            $array_validar = mysqli_fetch_array($query_validar);
            return array(1, $array_validar['nome'], $array_validar['token'], $array_validar['email'], $array_validar['id']);
        } else {
            removerCookie('auth');
            return array(0, null, null);
        }
    }
}
