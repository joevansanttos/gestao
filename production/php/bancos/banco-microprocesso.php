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