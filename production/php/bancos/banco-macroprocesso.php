<?php
function buscaMacroprocesso($conexao, $cod_pi){
    $query = "select  * from macroprocessos where cod_pi = '{$cod_pi}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

function buscaMacroprocessoId($conexao, $id_macroprocesso){
    $query = "select  * from macroprocessos where id_macroprocesso = {$id_macroprocesso}";
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


function listaPiMacroprocessos($conexao, $cod_pi){
  $clientes = array();
    $query = "select  * from macroprocessos where cod_pi='{$cod_pi}' order by n_processo";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

