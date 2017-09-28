<?php
function listaPeriodicidades($conexao){
  $clientes = array();
    $query = "select  * from periodicidade";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function listaClassificacoes($conexao){
  $clientes = array();
    $query = "select  * from classificacao";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}