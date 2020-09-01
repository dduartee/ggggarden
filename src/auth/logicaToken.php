<?php
    function validar($link)
    {
        require 'tokenfunctions.php';
        if (isset($_COOKIE['auth'])) {
            [$validacao, $nome, $token] = validarToken($_COOKIE['auth'], $link);
            if(!$validacao) {
                $nome = null;
                $token = null;
                $validacao = 0;
                return array($validacao, $nome, $token);
            } else {
                $nome = $nome;
                $token = $token;
                $validacao = 1;
                return array($validacao, $nome, $token);
            }
        } else {
            $nome = null;
            $token = null;
            $validacao = 0;
            return array($validacao, $nome, $token);
        }
    }