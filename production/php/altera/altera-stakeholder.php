<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-stakeholders.php";
	$id_stakeholder = $_GET['id_stakeholder'];
	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$cargo = $_GET['cargo'];
	$departamento = $_GET['departamento'];
	$stakeholder = buscaStakeholderId($conexao, $id_stakeholder);
	
	$query = "update  stakeholders  set nome ='{$nome}', email ='{$email}', cargo ='{$cargo}', departamento ='{$departamento}' where id_stakeholder = {$id_stakeholder}";

	if(mysqli_query($conexao, $query)){
		$cod_pi = $stakeholder['cod_pi'];
		mysqli_close($conexao);
		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
	}else{
	}

?>