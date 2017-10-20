<?php

function buscaStakeholderId($conexao, $id_stakeholder){
    $query = "select  * from stakeholders where id_stakeholder={$id_stakeholder}";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);    
    return $cliente;
}

function listaStakeholdersMacroprocessos($conexao, $id_macroprocesso){
  $clientes = array();
    $query = "select  * from stakeholders_macro where id_macroprocesso ={$id_macroprocesso}";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function buscaStakeholderMacro($conexao, $id_stakeholder){
    $query = "select  * from stakeholders_macro where id_stakeholder_macro={$id_stakeholder}";
    $resultado = mysqli_query($conexao, $query);
    $cliente = mysqli_fetch_assoc($resultado);    
    return $cliente;
}

?>