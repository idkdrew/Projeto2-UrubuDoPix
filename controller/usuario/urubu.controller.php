<?php

    if($acao == 'sair'){
        session_start();
        unset($_SESSION['admin']);
        header("Location: /index.php/usuario/produtos/inicio");
        exit;
    }

    require_once("views.php");
    

?>