<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-stakeholders.php";
	require_once "../bancos/banco-macroprocesso.php";
	$id_macroprocesso = $_GET['id_macroprocesso'];
	$descricao = $_GET['descricao'];
	$macroprocesso = buscaMacroprocessoId($conexao, $id_macroprocesso);
	$query = "update  macroprocessos  set descricao ='{$descricao}' where id_macroprocesso = {$id_macroprocesso}";
	if(mysqli_query($conexao, $query)){
		$cod_pi = $macroprocesso['cod_pi'];
		mysqli_close($conexao);
		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
	}else{
	}

?>