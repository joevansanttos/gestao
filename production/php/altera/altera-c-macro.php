<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-macroprocesso.php";
	$id_macroprocesso = $_GET['id_macroprocesso'];
	$id_periodicidade = $_GET['id_periodicidade'];
	$id_classificacao = $_GET['id_classificacao'];
	$qPessoas = $_GET['qPessoas'];
	$horas = $_GET['horas'];
	$macroprocesso = buscaMacroprocessoId($conexao, $id_macroprocesso);
	$cod_pi = $macroprocesso['cod_pi'];
	$query = "update  macroprocessos  set qPessoas ={$qPessoas}, horas ={$horas}, id_periodicidade = $id_periodicidade, id_classificacao = $id_classificacao where id_macroprocesso = $id_macroprocesso";
	if(mysqli_query($conexao, $query)){
		mysqli_close($conexao);
		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi");  
	}else{
		echo mysqli_error($conexao);
	}

?>