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