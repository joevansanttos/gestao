<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-subprocesso.php";
	require_once "../bancos/banco-macroprocesso.php";
	$id_subprocesso = $_GET['id_subprocesso'];
	$id_periodicidade = $_GET['id_periodicidade'];
	$id_classificacao = $_GET['id_classificacao'];
	$qPessoas = $_GET['qPessoas'];
	$horas = $_GET['horas'];
	$subprocesso = buscaSubprocessoId($conexao, $id_subprocesso);
	$macroprocesso = buscaMacroprocessoId($conexao, $subprocesso['id_macroprocesso']);
	$cod_pi = $macroprocesso['cod_pi'];
	$query = "update  subprocessos  set qPessoas ={$qPessoas}, horas ={$horas}, id_periodicidade = $id_periodicidade, id_classificacao = $id_classificacao where id_subprocesso = $id_subprocesso";
	if(mysqli_query($conexao, $query)){
		mysqli_close($conexao);
		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi");  
	}else{
		echo mysqli_error($conexao);
	}

?>