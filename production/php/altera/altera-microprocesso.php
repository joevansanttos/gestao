<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-microprocesso.php";
	require_once "../bancos/banco-subprocesso.php";
	require_once "../bancos/banco-macroprocesso.php";
	$id_microprocesso = $_GET['id_microprocesso'];
	$t_microprocesso = $_GET['t_microprocesso'];
	$n_microprocesso = $_GET['n_microprocesso'];
	$microprocesso = buscaMicroprocessoId($conexao, $id_microprocesso);
	$subprocesso = buscaSubprocessoId($conexao, $microprocesso['id_subprocesso']);
	$macroprocesso = buscaMacroprocessoId($conexao, $subprocesso['id_macroprocesso']);
	$query = "update  microprocessos  set n_microprocesso ='{$n_microprocesso}', t_microprocesso ='{$t_microprocesso}' where id_microprocesso = $id_microprocesso";
	if(mysqli_query($conexao, $query)){
		mysqli_close($conexao);
		$cod_pi = $macroprocesso['cod_pi'];
		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi");  
	}else{
		echo mysqli_error($conexao);
	}
?>