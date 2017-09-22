<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-departamento.php";?>
<?php
	$nome = $_POST["nome"];
	$id_departamento = $_POST["id_departamento"];
	$query = "update  departamentos  set nome ='{$nome}' where id_departamento = {$id_departamento}";

	if(mysqli_query($conexao, $query)){
		mysqli_close($conexao);
		header("Location: ../clientes/departamentos.php"); 
	}else{
		echo mysqli_error($conexao);
	}
