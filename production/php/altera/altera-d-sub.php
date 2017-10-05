<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-subprocesso.php";
	require_once "../bancos/banco-macroprocesso.php";
	$id_subprocesso = $_GET['id_subprocesso'];
	$descricao = $_GET['descricao'];
	$subprocesso = buscaSubprocessoId($conexao, $id_subprocesso);
	$macroprocesso = buscaMacroprocessoId($conexao, $subprocesso['id_macroprocesso']);
	$query = "update  subprocessos  set descricao ='{$descricao}' where id_subprocesso = {$id_subprocesso}";
	if(mysqli_query($conexao, $query)){
		$cod_pi = $macroprocesso['cod_pi'];
		mysqli_close($conexao);
		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
	}else{
	}

?>