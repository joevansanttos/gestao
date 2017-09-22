<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-pis.php";?>

<?php
$id_objetivo = $_GET['id_objetivo'];
$objetivo = buscaObjetivoId($conexao , $id_objetivo);
$pi = buscaPi($conexao , $objetivo['cod_pi']);
$cod_pi = $pi['cod_pi'];
$descricao = $_GET['descricao'];

$query = "update  objetivos  set descricao ='{$descricao}' where id_objetivo = {$id_objetivo}";

if(mysqli_query($conexao, $query)){
	mysqli_close($conexao);
	header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
}else{

}