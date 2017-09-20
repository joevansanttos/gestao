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