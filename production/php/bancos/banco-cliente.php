<?php

function  buscaCliente($conexao , $id_cliente){
    $query = "select  * from clientes where id_cliente = $id_cliente";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);
    return $cliente;

}

function  buscaClienteNome($conexao , $nome){
    $query = "select  * from clientes where id_usuario = '{$nome}'";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);
    return $cliente;

}

function listaClientes($conexao){
  $clientes = array();
    $query = "select  * from clientes";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}
