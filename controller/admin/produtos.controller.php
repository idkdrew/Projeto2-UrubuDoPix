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
    } elseif($acao == 'gravar'){
        if(empty($_POST['nome'])||empty($_POST['descricao'])||empty($_POST['preco']) ||empty($_POST['quantidade'])){
            $erro = true;
            $acao = 'novo';
        }else{
            $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
            $query = $bd->prepare("INSERT INTO produto(nome, imagem, descricao,preco,estoque) VALUES(:nome, :imagem, :descricao, :preco, :estoque)");
            $query->bindParam(':nome', $_POST['nome']);
            $query->bindParam(':imagem', $imagem);
            $query->bindParam(':descricao', $_POST['descricao']);
            $query->bindParam(':preco', $_POST['preco']);
            $query->bindParam(':estoque', $_POST['quantidade']);
            $query->execute();
            $erro = false;
            
            header("Location: /index.php/admin/produtos/listar");
            exit;

        }
    } elseif($acao == 'novo'){
        $erro = false;
    } elseif($acao == 'remover'){
        $query = $bd->prepare("DELETE FROM produto WHERE id = :id");
        $query->bindParam(':id', $_GET['id']);
        $query->execute();

        header("Location: /index.php/admin/produtos/listar");
        exit;
        
    }

    require_once("views.php");

?>