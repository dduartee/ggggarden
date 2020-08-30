<?php
$http_header = apache_request_headers();
if (isset($http_header['Authorization']) && $http_header['Authorization'] != NULL) {
    $bearer = explode(' ', $http_header['Authorization']);
    $token = explode('.', $bearer[1]);
    if (!isset($token[0], $token[1], $token[2])) {
        return 0;
    } else {
        $header = $token[0];
        $payload = $token[1];
        $sign = $token[2];
        $key = '123456';
        $valid = hash_hmac('sha256', $header . "." . $payload, $key, true);
        $valid = base64_encode($valid);
        if ($sign === $valid) {
            $tokenParts = explode(".", $bearer[1]);
            $tokenHeader = base64_decode($tokenParts[0]);
            $tokenPayload = base64_decode($tokenParts[1]);
            $jwtHeader = json_decode($tokenHeader);
            $jwtPayload = json_decode($tokenPayload);
            $_SESSION['nome'] = null;
            $_SESSION['nome'] = $jwtPayload->nome;
            return 1;
        } else {
            return 0;
        }
    }
}
