<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-cliente.php";?>

<?php
	$nome = $_POST["nome"];
	$query = "insert into clientes(nome) values ('{$nome}')";
	if(mysqli_query($conexao, $query)){
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false){
		  $image = $_FILES['image']['tmp_name'];
		  $imgContent = addslashes(file_get_contents($image));         
		  $cliente = buscaClienteNome($conexao , $nome);
		  $id_cliente = $cliente['id_cliente'];
		  $query = "insert into cliente_img (image, id_cliente) VALUES ('$imgContent', $id_cliente )";
		  if(mysqli_query($conexao,$query)){
		  	mysqli_close($conexao);
		  	header("Location: ../clientes/clientes.php");
		  }else{
		  	echo mysqli_error($conexao);
		  }
		  
		}
	}else{
		echo mysqli_error($conexao);
	}