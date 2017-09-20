<?php include "../bancos/conecta.php";?>

<?php
	$nome = $_POST["nome"];
	$id_cliente = $_POST["id_cliente"];
	$query = "insert into departamentos(nome, id_cliente) values ('{$nome}', $id_cliente)";
	if(mysqli_query($conexao, $query)){
		mysqli_close($conexao);
		header("Location: ../departamentos/departamentos.php");
	}else{
		echo "erro";
	}