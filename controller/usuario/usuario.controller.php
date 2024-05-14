<?php
    require_once("configuration/Conexao.php");
    $bd = Conexao::get();


    if($acao=='entrar'){
        require_once("model/usuario.php");
        session_start();
        if(!empty($_SESSION['userlogado'])){
            header("Location: /index.php/usuario/usuario/infos");
            exit;
        }else{
            $erro = false;
        }
    } elseif($acao=='cadastro'){
        $erro = false;
        $indisponivel = false;
    }elseif($acao=='cadastrar'){
        if(empty($_POST['login'])||empty($_POST['nome'])||empty($_POST['senha'])){
            $erro = true;
            $indisponivel = false;
            $acao = 'cadastro';
        }else{
            $query = $bd->prepare("SELECT * FROM usuario WHERE login = :login");
            $query->bindParam(':login', $_POST['login']);
            $query->execute();

            if($query->rowCount()==0&&$_POST['login']!='urubu'){
                $query = $bd->prepare("INSERT INTO usuario(login, nome,senha) VALUES(:login, :nome, :senha)");
                $query->bindParam(':login', $_POST['login']);
                $query->bindParam(':nome', $_POST['nome']);
                $query->bindParam(':senha', $_POST['senha']);
                $query->execute();
                header("Location: /index.php/usuario/usuario/entrar");
                exit;
            }else{
                $erro = false;
                $indisponivel = true;
                $acao = 'cadastro';
            }
        }

        
    } elseif($acao=='login'){
        if($_POST['login']=='urubu'&&$_POST['senha']=='urubu'){
            session_start();
            $_SESSION['admin'] = true;
            header("Location: /index.php/admin/admin/inicio");
            exit;
        }else{
            require_once("model/usuario.php");
            $query = $bd->prepare("SELECT * FROM usuario WHERE login = :login AND senha = :senha");
            $query->bindParam(':login', $_POST['login']);
            $query->bindParam(':senha', $_POST['senha']);
            $query->execute();

            if($query->rowCount()==0){
                $acao = "entrar";
                $erro = true;
            }else{
                $usuario = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $usuario = new Usuario($usuario[0]['login'], $usuario[0]['nome']);
                session_start();
                $_SESSION['userlogado'] = serialize($usuario);
                header("Location: /index.php/usuario/usuario/infos");
                exit;
            }
        }
       
    } elseif($acao=='sair'){
        session_start();
        session_destroy();
        header("Location: /index.php/usuario/produtos/inicio");
        exit;
    } elseif($acao == 'infos'){
        require_once("model/usuario.php");
        session_start();
        if(!empty($_SESSION['userlogado'])){
            $usuario = unserialize($_SESSION['userlogado']);
        }else{
            header("Location: /index.php/usuario/usuario/entrar");
            exit;
        }
    } elseif($acao == 'enderecos'){
        require_once("model/usuario.php");
        session_start();
        if(!empty($_SESSION['userlogado'])){
            $usuario = unserialize($_SESSION['userlogado']);
            $login = $usuario->getLogin();
            require_once("model/endereco.php");
            $query = $bd->prepare("SELECT * FROM endereco WHERE login = :login");
            $query->bindParam(':login', $login);
            $query->execute();
            $enderecos = $query->fetchAll(PDO::FETCH_ASSOC);
            $listaEnderecos = [];

            foreach ($enderecos as $endereco) {
                $listaEnderecos[] = new Endereco($endereco['id'], $endereco['login'], $endereco['cep'], $endereco['logradouro'], $endereco['complemento'], $endereco['numero'], $endereco['bairro'], $endereco['cidade'], $endereco['uf']);
            }

        }else{
            header("Location: /index.php/usuario/usuario/entrar");
            exit;
        }
    } elseif($acao == 'novoendereco'){
        $erro = false;
    } elseif($acao == 'procurarendereco'){
        $cep = $_POST['cep'];
        require_once("model/viacep.php");
        if($erro){
            $acao = 'novoendereco';
        }
    } elseif($acao == 'cadastrarendereco'){
        if(empty($_POST['logradouro'])||empty($_POST['numero'])||empty($_POST['bairro'])||empty($_POST['cidade'])||empty($_POST['uf'])){
            $erro = true;
            $acao = 'procurarendereco';
        }else{
            $complemento = empty($_POST['complemento']) ? "" : $_POST['complemento'];
            require_once("model/usuario.php");
            session_start();
            $usuario = unserialize($_SESSION['userlogado']);
            $login = $usuario->getLogin();
            $query = $bd->prepare("INSERT INTO endereco(login, cep, logradouro, complemento, numero, bairro, cidade, uf) VALUES(:login, :cep, :logradouro, :complemento, :numero, :bairro, :cidade, :uf)");
            $query->bindParam(':login', $login);
            $query->bindParam(':cep', $_POST['cep']);
            $query->bindParam(':logradouro', $_POST['logradouro']);
            $query->bindParam(':complemento', $complemento);
            $query->bindParam(':numero', $_POST['numero']);
            $query->bindParam(':bairro', $_POST['bairro']);
            $query->bindParam(':cidade', $_POST['cidade']);
            $query->bindParam(':uf', $_POST['uf']);
            $query->execute();
            header("Location: /index.php/usuario/usuario/enderecos");
            exit;
        }
    } elseif($acao == 'compras'){
        require_once("model/usuario.php");
        session_start();
        if(!empty($_SESSION['userlogado'])){
            $usuario = unserialize($_SESSION['userlogado']);
            $login = $usuario->getLogin();
            require_once("model/compra.php");
            $query = $bd->prepare("SELECT * FROM compra WHERE login = :login");
            $query->bindParam(':login', $login);
            $query->execute();
            $compras = $query->fetchAll(PDO::FETCH_ASSOC);
            $listaCompras = [];

            foreach ($compras as $compra) {
                $listaCompras[] = new Compra($compra['id'], $compra['login'], $compra['data']);
            }

        }else{
            header("Location: /index.php/usuario/usuario/entrar");
            exit;
        }
    } elseif($acao == 'compra'){
        $id = $_GET['id'];
        session_start();
        $_SESSION['id'] = $id;
        header("Location: /index.php/usuario/usuario/visualizarcompra");
        exit;
    } elseif($acao == 'visualizarcompra'){
        session_start();
        $id = $_SESSION['id'];
        require_once("model/compra.php");
        $query = $bd->prepare("SELECT * FROM compra WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $compra = $query->fetch(PDO::FETCH_ASSOC);
        $data = $compra['data'];
        require_once("model/itemcompra.php");
        require_once("model/produto.php");
        $query = $bd->prepare("SELECT * FROM itemcompra WHERE idcompra = :idcompra");
        $query->bindParam(':idcompra', $compra['id']);
        $query->execute();
        $itens = $query->fetchAll(PDO::FETCH_ASSOC);
        $listaProdutos = [];
        $preco = 0;
        foreach ($itens as $itemcompra) {
            $query = $bd->prepare("SELECT * FROM produto WHERE id = :id");
            $query->bindParam(':id', $itemcompra['idproduto']);
            $query->execute();
            $produto = $query->fetch(PDO::FETCH_ASSOC);
            $preco += $produto['preco'];
            $listaProdutos[] = new Produto($produto['id'], $produto['nome'], $produto['descricao'], $produto['preco'], $produto['estoque']);
        }
    }
    require_once("views.php");

?>