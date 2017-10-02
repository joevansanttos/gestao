<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-macroprocesso.php";
	require_once "../bancos/banco-pis.php";
	$id_macroprocesso = $_GET['id_macroprocesso'];
	$macroprocesso = buscaMacroprocessoId($conexao, $id_macroprocesso);
	$n_processo = $_GET['n_processo'];
	$t_processo = $_GET['t_processo'];	
	$pi = buscaPi($conexao , $macroprocesso['cod_pi']);
	$cod_pi = $pi['cod_pi'];
	$query = "update  macroprocessos  set n_processo ='{$n_processo}', t_processo ='{$t_processo}' where id_macroprocesso = $id_macroprocesso";
	if(mysqli_query($conexao, $query)){
	mysqli_close($conexao);
	header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi");  
	}else{
	echo mysqli_error($conexao);
	}
