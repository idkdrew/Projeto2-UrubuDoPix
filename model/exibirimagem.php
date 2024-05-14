<?php
    require_once("configuration/Conexao.php");
    $bd = Conexao::get();

    $query = $bd->prepare("SELECT imagem FROM produto WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
        
    if($query->rowCount()==0){
        echo '<img src="../../../assets/images/produto.png"  style="width: 100%; height: 100%"/>';
    }else{
        $imagem = $query->fetch(PDO::FETCH_ASSOC)['imagem'];
        if($imagem==NULL){
            echo '<img src="../../../assets/images/produto.png"  style="width: 100%; height: 100%"/>';
        }else{
            echo '<img src="data:image/jpeg;base64,' . base64_encode($imagem) . '"  style="width: 100%; height: 100%;"/>';
        }
        
    }
        
    

?>