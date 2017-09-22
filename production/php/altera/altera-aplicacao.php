<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-pis.php";?>

<?php
$id_aplicacao = $_GET['id_aplicacao'];
$aplicacao = buscaAplicacaoId($conexao , $id_aplicacao);
$pi = buscaPi($conexao , $aplicacao['cod_pi']);
$cod_pi = $pi['cod_pi'];
$descricao = $_GET['descricao'];

$query = "update  aplicacoes  set descricao ='{$descricao}' where id_aplicacao = {$id_aplicacao}";

if(mysqli_query($conexao, $query)){
	mysqli_close($conexao);
	header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
}else{

}