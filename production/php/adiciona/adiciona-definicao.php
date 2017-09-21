<?php include "../bancos/conecta.php";?>
<?php
$cod_pi = $_GET['cod_pi'];
$definicoes = $_GET['multiple'];

$i = 0;
$size = count($definicoes);
while ($i < $size) {
	$query = "insert into definicoes (cod_pi, descricao) values ('{$cod_pi}', '{$definicoes[$i]}')";
	mysqli_query($conexao, $query);
	$i++;
}	

header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 

