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
    unset($_COOKIE[$cookie]);
}
function validarToken($cookieAuth, $link)
{
    $tokenData = isset($cookieAuth) ? json_decode($cookieAuth, true) : false;
    if ($tokenData) {
        $id = $tokenData['i'];
        $token = $tokenData['t'];
        $sql_validar = "SELECT token_id, token, nome FROM usuarios WHERE token_id='".$id."'AND token='".$token."'";
        $query_validar = mysqli_query($link, $sql_validar);
        if ($query_validar) {
            $array_validar = mysqli_fetch_array($query_validar);
            return array(1, $array_validar['nome'], $array_validar['token']);
        } else {
            unset($_COOKIE['auth']);
            return array(0, null, null);
        }
    }
}
