<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-pis.php";?>
<?php include "../bancos/banco-macroprocesso.php";?>
<?php include "../bancos/banco-subprocesso.php";?>
<?php
$t_microprocesso = $_GET['t_microprocesso'];
$n_microprocesso = $_GET['n_microprocesso'];
$id_subprocesso = $_GET['id_subprocesso'];
$descricao = $_GET['descricao'];

$sub = buscaSubprocessoId($conexao, $id_subprocesso);
$macro = buscaMacroprocessoId($conexao, $sub['id_macroprocesso']);
$pi = buscaPi($conexao , $macro['cod_pi']);

$query = "insert into microprocessos (id_subprocesso, n_microprocesso, t_microprocesso, descricao) values ({$id_subprocesso}, '{$n_microprocesso}', '{$t_microprocesso}', '{$descricao}')";

if(mysqli_query($conexao, $query)){
  $cod_pi = $pi['cod_pi'];
  header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
}else{
  echo mysqli_error($conexao);
}