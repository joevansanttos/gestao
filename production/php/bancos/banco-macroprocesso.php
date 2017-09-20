<?php
function buscaMacroprocesso($conexao, $cod_pi){
    $query = "select  * from macroprocessos where cod_pi = '{$cod_pi}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

function listaMacroprocessos($conexao){
  $clientes = array();
    $query = "select  * from macroprocessos";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}