<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-stakeholders.php";
	require_once "../bancos/banco-macroprocesso.php";
	$id_stakeholder = $_GET['id_stakeholder'];
	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$cargo = $_GET['cargo'];
	$departamento = $_GET['departamento'];

	$stakeholder = buscaStakeholderMacro($conexao, $id_stakeholder);
	$macroprocesso = buscaMacroprocessoId($conexao, $stakeholder['id_macroprocesso']);
	$cod_pi = $macroprocesso['cod_pi'];
	
	$query = "update  stakeholders_macro  set nome ='{$nome}', email ='{$email}', cargo ='{$cargo}', departamento ='{$departamento}' where id_stakeholder_macro = {$id_stakeholder}";

	if(mysqli_query($conexao, $query)){
		mysqli_close($conexao);
		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
	}else{
		echo mysqli_error($conexao);
	}

?>