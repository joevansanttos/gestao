<?php include "../bancos/conecta.php";?>

<?php
$cod_pi = $_GET['cod_pi'];
$nomes = $_GET['nomes'];
$cargos = $_GET['cargos'];
$emails = $_GET['emails'];
$departamentos = $_GET['departamentos'];

$i = 0;
$size = count($nomes);
while ($i < $size) {
   $query = "insert into stakeholders (nome, cargo, email, departamento, cod_pi ) values ('$nomes[$i]', '$cargos[$i]', '$emails[$i]', '$departamentos[$i]', '{$cod_pi}')" ;
   if(mysqli_query($conexao, $query)){
      
   }else{
      echo mysqli_error($conexao);
   }
   $i++;
}

	header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 



