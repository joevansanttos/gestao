<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-macroprocesso.php";?>
<?php include "../bancos/banco-pis.php";?>
<?php
$id_macroprocesso = $_GET['id_macroprocesso'];
$macroprocesso = buscaMacroprocessoId($conexao, $id_macroprocesso);
$n_processo = $_GET['n_processo'];
$t_processo = $_GET['t_processo'];
$id_periodicidade = $_GET['id_periodicidade'];
$id_classificacao = $_GET['id_classificacao'];
$qPessoas = $_GET['qPessoas'];
$horas = $_GET['horas'];
$pi = buscaPi($conexao , $macroprocesso['cod_pi']);
$cod_pi = $pi['cod_pi'];
$query = "update  macroprocessos  set n_processo ='{$n_processo}', t_processo ='{$t_processo}', id_periodicidade = $id_periodicidade, id_classificacao = $id_classificacao where id_macroprocesso = $id_macroprocesso";

if(mysqli_query($conexao, $query)){
	mysqli_close($conexao);
	header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi");  
}else{
	echo mysqli_error($conexao);
}
