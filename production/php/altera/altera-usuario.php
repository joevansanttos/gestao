<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-usuario.php";?>
<?php
	$id_usuario = $_GET['id_usuario'];
	$usuario = buscaUsuario($conexao, $id_usuario);

	$nome = $_GET['nome'];
	$sobrenome = $_GET['sobrenome'];
	$email = $_GET['email'];
	$senha =  $_GET['senha'];
	$senhaMD5 = md5($senha);
	$sexo =  $_GET['sexo'];

	$query = "update  usuarios  set nome ='{$nome}', sobrenome ='{$sobrenome}' , email ='{$email}' , senha ='{$senhaMD5}', sexo ='{$sexo}' where id_usuario = {$id_usuario}";

	if(mysqli_query($conexao, $query)){
		header("Location: ../usuarios/consultores.php");
	}else{
		echo mysli_error($conexao);
	}
