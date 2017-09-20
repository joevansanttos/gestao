<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-macroprocesso.php";?>
<?php
$cod_pi = $_GET['cod_pi'];
$n_processo = $_GET['n_processo'];
$t_processo = $_GET['t_processo'];

$nome = $_GET['nome'];
$email = $_GET['email'];
$cargo = $_GET['cargo'];
$tel = $_GET['tel'];

 $query = "insert into macroprocessos (cod_pi, n_processo, t_processo) values ('{$cod_pi}', '{$n_processo}', '{$t_processo}')";

  if(mysqli_query($conexao, $query)){
  	$macroprocesso = buscaMacroprocesso($conexao, $cod_pi);
  	$query = "insert into gestor_macro (id_macroprocesso, nome, email, tel, cargo) values ({$macroprocesso['id_macroprocesso']}, '{$nome}', '{$email}' , '{$tel}', '{$cargo}')";
  	if(mysqli_query($conexao, $query)){
  		mysqli_close($conexao);
  		header("Location: ../processos/processos.php"); 
  	}else{
  		echo mysqli_error($conexao);
  	}
  	
  }	