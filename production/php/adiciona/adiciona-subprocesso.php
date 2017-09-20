<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-pis.php";?>
<?php include "../bancos/banco-macroprocesso.php";?>
<?php
$t_subprocesso = $_GET['t_subprocesso'];
$n_subprocesso = $_GET['n_subprocesso'];
$id_macroprocesso = $_GET['id_macroprocesso'];
$descricao = $_GET['descricao'];

$macro = buscaMacroprocessoId($conexao, $id_macroprocesso);
$pi = buscaPi($conexao , $macro['cod_pi']);

$query = "insert into subprocessos (id_macroprocesso, n_subprocesso, t_subprocesso, descricao) values ({$id_macroprocesso}, '{$n_subprocesso}', '{$t_subprocesso}', '{$descricao}')";

if(mysqli_query($conexao, $query)){
  $cod_pi = $pi['cod_pi'];
  header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
}else{
  echo mysqli_error($conexao);
}
  	
