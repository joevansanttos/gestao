<?php

function listaMacroSubprocessos($conexao, $id_macroprocesso){
	$clientes = array();
	  $query = "select  * from subprocessos where id_macroprocesso={$id_macroprocesso}";
	  $resultado = mysqli_query($conexao, $query);
	  while ($cliente = mysqli_fetch_assoc($resultado)) {
	    array_push($clientes, $cliente);
	  }
	  
	  return $clientes;
}

function buscaSubprocessoId($conexao, $id_subprocesso){
    $query = "select  * from subprocessos where id_subprocesso = {$id_subprocesso}";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}