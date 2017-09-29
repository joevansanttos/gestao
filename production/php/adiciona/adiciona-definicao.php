<?php include "../bancos/conecta.php";?>
<?php
$cod_pi = $_GET['cod_pi'];
$descricao = $_GET['descricao'];

$query = "insert into definicoes (cod_pi, descricao) values ('{$cod_pi}', '{$descricao}')";
if(mysqli_query($conexao, $query)){
	mysqli_close($conexao);
	header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 
}

header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 

