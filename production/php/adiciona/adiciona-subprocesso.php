<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-pis.php";
	require_once "../bancos/banco-macroprocesso.php";
	require_once "../bancos/banco-subprocesso.php";
	$id_macroprocesso = $_GET['id_macroprocesso'];
	$t_subprocesso = $_GET['t_subprocesso'];
	$n_subprocesso = $_GET['n_subprocesso'];
	$descricao = $_GET['descricao'];
	$id_periodicidade = $_GET['id_periodicidade'];
	$id_classificacao = $_GET['id_classificacao'];
	$qPessoas = $_GET['qPessoas'];
	$horas = $_GET['horas'];
	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$cargo = $_GET['cargo'];
	$tel = $_GET['tel'];
	$macro = buscaMacroprocessoId($conexao, $id_macroprocesso);
	$pi = buscaPi($conexao , $macro['cod_pi']);

	$query = "insert into subprocessos (id_macroprocesso, n_subprocesso, t_subprocesso, id_periodicidade, id_classificacao, qPessoas, horas, descricao) values ({$id_macroprocesso}, '{$n_subprocesso}', '{$t_subprocesso}', $id_periodicidade, $id_classificacao, $qPessoas,$horas, '{$descricao}')";

	if(mysqli_query($conexao, $query)){
		$subprocesso = buscaSubprocessoValues($conexao, $id_macroprocesso, $n_subprocesso, $t_subprocesso );
		$id_subprocesso = $subprocesso['id_subprocesso'];
		$query = "insert into gestor_sub (id_subprocesso, nome, email, tel, cargo) values ({$id_subprocesso}, '{$nome}', '{$email}' , '{$tel}', '{$cargo}')";
		if(mysqli_query($conexao, $query)){
			mysqli_close($conexao);
			$cod_pi = $pi['cod_pi'];
			header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi");
		}else{
			echo mysqli_error($conexao);
		}
	}else{
    echo mysqli_error($conexao);
	}	


