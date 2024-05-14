<?php
    $rota = explode('/', substr($_SERVER['REQUEST_URI'], 1));
    $permissao = empty($rota[1]) ? 'usuario' : $rota[1];
    $recurso = empty($rota[2]) ? 'produtos' : $rota[2];
    $controlador = "controller/$permissao/$recurso.controller.php";
    $acao = empty($rota[3]) ? "inicio" : $rota[3];
    if (file_exists($controlador)) {
        require($controlador);
    } else {
        require("controller/404.controller.php");
    }