<?php

function listaMicroprocessos($conexao, $id_subprocesso){
	$clientes = array();
	  $query = "select  * from microprocessos where id_subprocesso={$id_subprocesso}";
	  $resultado = mysqli_query($conexao, $query);
	  while ($cliente = mysqli_fetch_assoc($resultado)) {
	    array_push($clientes, $cliente);
	  }
	  
	  return $clientes;
}

function buscaMicroprocessoId($conexao, $id_subprocesso){
    $query = "select  * from microprocessos where id_microprocesso = {$id_subprocesso}";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

function buscaMicroprocessoValues($conexao, $id_subprocesso, $n_microprocesso, $t_microprocesso ){
  $query = "select * from microprocessos where n_microprocesso = '{$n_microprocesso}' and t_microprocesso= '{$t_microprocesso}' and id_subprocesso = $id_subprocesso";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}