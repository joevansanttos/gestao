<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-departamento.php";?>

<?php
	$nome = $_POST["nome"];
	$id_cliente = $_POST["id_cliente"];

	$responsavel = $_POST['responsavel'];
	$email = $_POST['email'];
	$cargo = $_POST['cargo'];
	$tel = $_POST['tel'];

	$query = "insert into departamentos(nome, id_cliente) values ('{$nome}', $id_cliente)";
	if(mysqli_query($conexao, $query)){
		$departamento = buscaDepartamentoNome($conexao, $nome, $id_cliente);
		$query = "insert into gestor_dep (id_departamento, nome, email, tel, cargo) values ({$departamento['id_departamento']}, '{$responsavel}', '{$email}' , '{$tel}', '{$cargo}')";
		if(mysqli_query($conexao, $query)){
			mysqli_close($conexao);
			header("Location: ../clientes/departamentos.php"); 
		}else{
			echo mysqli_error($conexao);
		}
	}else{
		echo mysqli_error($conexao);
	}