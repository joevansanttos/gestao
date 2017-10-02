<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-stakeholders.php";
	require_once "../bancos/banco-pis.php";
	$id_stakeholder = $_GET['id_stakeholder'];
	$stakeholder = buscaStakeholderId($conexao, $id_stakeholder);
	$pi = buscaPi($conexao, $stakeholder['cod_pi']);
	
	$query = "delete from  stakeholders  where id_stakeholder = {$id_stakeholder}";

	if(mysqli_query($conexao, $query)){
		$cod_pi = $pi['cod_pi'];
		mysqli_close($conexao);
		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
	}else{
	}

?>