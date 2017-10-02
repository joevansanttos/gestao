<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-subprocesso.php";
	require_once "../bancos/banco-macroprocesso.php";
	$id_subprocesso = $_GET['id_subprocesso'];
	$t_subprocesso = $_GET['t_subprocesso'];
	$n_subprocesso = $_GET['n_subprocesso'];
	$subprocesso = buscaSubprocessoId($conexao, $id_subprocesso);
	$macroprocesso = buscaMacroprocessoId($conexao, $subprocesso['id_macroprocesso']);
	$query = "update  subprocessos  set n_subprocesso ='{$n_subprocesso}', t_subprocesso ='{$t_subprocesso}' where id_subprocesso = $id_subprocesso";
	if(mysqli_query($conexao, $query)){
	mysqli_close($conexao);
	$cod_pi = $macroprocesso['cod_pi'];
	header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi");  
	}else{
	echo mysqli_error($conexao);
	}


?>