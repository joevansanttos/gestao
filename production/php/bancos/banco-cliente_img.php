<?php

function  buscaImagemCliente($conexao , $id_cliente){
    $query = "select  * from cliente_img where id_cliente = $id_cliente";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);
    return $cliente;

}

function  buscaImagem($conexao , $id_cliente_img){
    $query = "select  * from cliente_img where id_cliente_img = $id_cliente_img";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);
    return $cliente;

}

