<?php
    $url = "https://viacep.com.br/ws/$cep/json/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $json = curl_exec($ch);
    
    $endereco = json_decode($json, true);
    if(isset($endereco['erro'])){
        $erro = true;
    }else{
        $erro = false;
        $cep =  $endereco['cep'];
        $logradouro = $endereco['logradouro'];
        $complemento = $endereco['complemento'];
        $bairro = $endereco['bairro'];
        $cidade = $endereco['localidade'];
        $uf = $endereco['uf'];
        $numero = '';
    }
    
?>