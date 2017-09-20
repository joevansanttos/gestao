<?php

function  buscaDepartamento($conexao , $id_departamento){
    $query = "select  * from departamentos where id_departamento = $id_departamento";
    $resultado = mysqli_query($conexao, $query);
    $departamento = mysqli_fetch_assoc($resultado);
    return $departamento;

}

function listaDepartamentos($conexao){
  $clientes = array();
    $query = "select  * from departamentos";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

?>