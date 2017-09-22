<?php

function  buscaPi($conexao , $cod_pi){
    $query = "select  * from pis where cod_pi = '{$cod_pi}'";
    $resultado = mysqli_query($conexao, $query);
    $pi = mysqli_fetch_assoc($resultado);
    return $pi;

}

function listaPis($conexao){
  $clientes = array();
    $query = "select  * from pis";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}


function buscaObjetivo($conexao, $cod_pi){
    $query = "select  * from objetivos where cod_pi='{$cod_pi}'";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);    
    return $cliente;
}

function buscaObjetivoId($conexao, $id_objetivo){
    $query = "select  * from objetivos where id_objetivo={$id_objetivo}";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);    
    return $cliente;
}

function buscaAplicacao($conexao, $cod_pi){
    $query = "select  * from aplicacoes where cod_pi='{$cod_pi}'";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);    
    return $cliente;
}

function buscaAplicacaoId($conexao, $id_objetivo){
    $query = "select  * from aplicacoes where id_objetivo={$id_objetivo}";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);    
    return $cliente;
}

function buscaInformacao($conexao, $cod_pi){
    $query = "select  * from informacoes where cod_pi='{$cod_pi}'";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);    
    return $cliente;
}

function listaDefinicaoPI($conexao, $cod_pi){
  $clientes = array();
    $query = "select  * from definicoes where cod_pi='{$cod_pi}'";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}