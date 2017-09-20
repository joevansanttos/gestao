<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-macroprocesso.php";?>
<?php
$id_departamento = $_GET['id_departamento'];
$cod_pi = $_GET['cod_pi'];

 $query = "insert into piS (id_departamento, cod_pi) values ({$id_departamento}, '{$cod_pi}')";

  if(mysqli_query($conexao, $query)){
  		mysqli_close($conexao);
  		header("Location: ../clientes/pis.php");   	
  }else{
      echo mysqli_error($conexao);
  }	