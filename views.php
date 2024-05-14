<?php

    if($acao=='404'){
        include("layout/usuario/header.php");
        include("layout/404.php");
        include("layout/footer.php");
    }else{
        if($permissao=='admin'){
            if (!isset($_SESSION)) {
                session_start();
            } 

            if(isset($_SESSION['admin'])){
                if(!$_SESSION['admin']){
                    header("Location: /index.php/usuario/produtos/inicio");
                    exit;
                }
            }else{
                header("Location: /index.php/usuario/produtos/inicio");
                exit;
            }
        }
    
        include("layout/${permissao}/header.php");
        if(file_exists("view/${permissao}/${recurso}/${acao}.view.php")) :
            include("view/${permissao}/${recurso}/${acao}.view.php");
        else :
            include("layout/404.php");
        endif;
    
        include("layout/footer.php");
    }

    