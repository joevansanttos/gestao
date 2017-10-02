<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-macroprocesso.php";
	require_once "../bancos/banco-gestores.php";
	$id_macroprocesso = $_GET['id_macroprocesso'];
	$macroprocesso = buscaMacroprocessoId($conexao, $id_macroprocesso);
	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$cargo = $_GET['cargo'];
	$tel = $_GET['tel'];
	$query = "update  gestor_macro  set nome ='{$nome}', email ='{$email}', cargo ='{$cargo}', tel='{$tel}'  where id_macroprocesso = {$id_macroprocesso}";
	if(mysqli_query($conexao, $query)){
		$cod_pi = $macroprocesso['cod_pi'];
		mysqli_close($conexao);
		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
	}else{
	}

?>