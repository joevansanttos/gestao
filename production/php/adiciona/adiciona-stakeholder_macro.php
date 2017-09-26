<?php include "../bancos/conecta.php";?>

<?php
$id_macroprocesso = $_GET['id_macroprocesso'];
$cod_pi = $_GET['cod_pi'];
$nomes = $_GET['nomes'];
$cargos = $_GET['cargos'];
$emails = $_GET['emails'];
$departamentos = $_GET['departamentos'];

$i = 0;
$size = count($nomes);
while ($i < $size) {
   $query = "insert into stakeholders_macro (nome, cargo, email, departamento, id_macroprocesso ) values ('$nomes[$i]', '$cargos[$i]', '$emails[$i]', '$departamentos[$i]', {$id_macroprocesso})" ;
   if(mysqli_query($conexao, $query)){
      
   }else{
      echo mysqli_error($conexao);
   }
   $i++;
}

	header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi"); 