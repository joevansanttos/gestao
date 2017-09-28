<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-macroprocesso.php";?>
<?php
$cod_pi = $_GET['cod_pi'];
$n_processo = $_GET['n_processo'];
$t_processo = $_GET['t_processo'];
$id_periodicidade = $_GET['id_periodicidade'];
$id_classificacao = $_GET['id_classificacao'];
$qPessoas = $_GET['qPessoas'];
$horas = $_GET['horas'];
$nome = $_GET['nome'];
$email = $_GET['email'];
$cargo = $_GET['cargo'];
$tel = $_GET['tel'];

 $query = "insert into macroprocessos (cod_pi, n_processo, t_processo, id_periodicidade, id_classificacao, qPessoas, horas) values ('{$cod_pi}', '{$n_processo}', '{$t_processo}', $id_periodicidade, $id_classificacao, $qPessoas,$horas )";

  if(mysqli_query($conexao, $query)){
  	$macroprocesso = buscaMacroprocesso($conexao, $cod_pi);
  	$query = "insert into gestor_macro (id_macroprocesso, nome, email, tel, cargo) values ({$macroprocesso['id_macroprocesso']}, '{$nome}', '{$email}' , '{$tel}', '{$cargo}')";
  	if(mysqli_query($conexao, $query)){
  		mysqli_close($conexao);
  		header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi");
  	}else{
  		echo mysqli_error($conexao);
  	}
  	
  }else{
      echo mysqli_error($conexao);
  }	