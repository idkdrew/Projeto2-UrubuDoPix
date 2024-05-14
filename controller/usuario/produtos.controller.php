<?php
    require_once("configuration/Conexao.php");
    $bd = Conexao::get();

    if($acao == 'listar'){
        require_once("model/produto.php");
        $query = $bd->prepare("SELECT * FROM produto");
        $query->execute();
        $produtos = $query->fetchAll(PDO::FETCH_ASSOC);
        $listaProdutos = [];

        foreach ($produtos as $produto) {
            $listaProdutos[] = new Produto($produto['id'], $produto['nome'], $produto['descricao'], $produto['preco'], $produto['estoque']);
        }
    }elseif($acao == 'carrinho'){
        $preco = 0;
        session_start();
        if(empty($_SESSION['userlogado'])){
            header("Location: /index.php/usuario/usuario/entrar");
            exit;
        }
        $listaProdutos = [];
        if(isset($_SESSION['carrinho'])){
            require_once("model/produto.php");
            foreach ($_SESSION['carrinho'] as $idproduto) {
                $query = $bd->prepare("SELECT * FROM produto WHERE id = :id");
                $query->bindParam(':id', $idproduto);
                $query->execute();
                $produtos = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach ($produtos as $produto) {
                    $preco += $produto['preco'];
                    $listaProdutos[] = new Produto($produto['id'], $produto['nome'], $produto['descricao'], $produto['preco'], $produto['estoque']);
                }
            }
            $erro = false;
        }else{
            $erro= true;
        }

    }else if($acao == 'adicionar'){
        session_start();
        if(empty($_SESSION['userlogado'])){
            header("Location: /index.php/usuario/usuario/entrar");
            exit;
        }else{
            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = [];
            }
            $_SESSION['carrinho'][] = $_GET['id'];
            header("Location: /index.php/usuario/produtos/carrinho");
            exit;
        } 
    }else if($acao == 'comprar'){
        require_once("model/usuario.php");
        require_once("model/produto.php");
        
        session_start();
        $usuario = unserialize($_SESSION['userlogado']);
        $login = $usuario->getLogin();
        $query = $bd->prepare("INSERT INTO compra(login) VALUES(:login)");
        $query->bindParam(':login', $login);
        $query->execute();

        $query = $bd->prepare("SELECT id FROM compra WHERE login=:login ORDER BY id DESC LIMIT 1");
        $query->bindParam(':login', $login);
        $query->execute();
        $idcompra = $query->fetch(PDO::FETCH_ASSOC);
        $quantidade = 1;
        foreach ($_SESSION['carrinho'] as $idproduto) {
            $query = $bd->prepare("INSERT INTO itemcompra(idcompra,idproduto,quantidade) VALUES(:idcompra, :idproduto, :quantidade)");
            $query->bindParam(':idcompra', $idcompra['id']);
            $query->bindParam(':idproduto', $idproduto);
            $query->bindParam(':quantidade', $quantidade);
            $query->execute();
        }
        unset($_SESSION['carrinho']);
    }else if($acao == 'limpar'){
        session_start();
        unset($_SESSION['carrinho']);
        header("Location: /index.php/usuario/produtos/carrinho");
        exit;
    }



    require_once("views.php");
    

?>