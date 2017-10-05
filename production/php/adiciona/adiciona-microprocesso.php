<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-pis.php";
	require_once "../bancos/banco-macroprocesso.php";
	require_once "../bancos/banco-subprocesso.php";
	require_once "../bancos/banco-microprocesso.php";
	$t_microprocesso = $_GET['t_microprocesso'];
	$n_microprocesso = $_GET['n_microprocesso'];
	$id_subprocesso = $_GET['id_subprocesso'];
	$id_periodicidade = $_GET['id_periodicidade'];
	$id_classificacao = $_GET['id_classificacao'];
	$qPessoas = $_GET['qPessoas'];
	$horas = $_GET['horas'];
	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$cargo = $_GET['cargo'];
	$tel = $_GET['tel'];
	$descricao = $_GET['descricao'];
	$sub = buscaSubprocessoId($conexao, $id_subprocesso);
	$macro = buscaMacroprocessoId($conexao, $sub['id_macroprocesso']);
	$pi = buscaPi($conexao , $macro['cod_pi']);
	$query = "insert into microprocessos (id_subprocesso, n_microprocesso, t_microprocesso, id_periodicidade, id_classificacao, qPessoas, horas, descricao) values ({$id_subprocesso}, '{$n_microprocesso}', '{$t_microprocesso}', $id_periodicidade, $id_classificacao, $qPessoas, $horas, '{$descricao}')";

	if(mysqli_query($conexao, $query)){
		$microprocesso = buscaMicroprocessoValues($conexao, $id_subprocesso, $n_microprocesso, $t_microprocesso);
		$id_microprocesso = $microprocesso['id_microprocesso'];
		$query = "insert into gestor_micro (id_microprocesso, nome, email, tel, cargo) values ({$id_microprocesso}, '{$nome}', '{$email}' , '{$tel}', '{$cargo}')";
  	$cod_pi = $pi['cod_pi'];
  	header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
	}else{
  	echo mysqli_error($conexao);
	}