<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-cliente.php";?>
<?php include "../bancos/banco-cliente_img.php";?>

<?php
  $id_cliente = $_POST['id_cliente'];
  $id_cliente_img = $_POST['id_cliente_img'];
	$nome = $_POST["nome"];
	$query = "update  clientes  set nome ='{$nome}' where id_cliente = {$id_cliente}";
	if(mysqli_query($conexao, $query)){
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false){
		  $image = $_FILES['image']['tmp_name'];
		  $imgContent = addslashes(file_get_contents($image));         
		  $cliente = buscaCliente($conexao , $id_cliente);
		  $imagem = buscaImagem($conexao , $id_cliente_img);
		  if(count($imagem) > 0){
		  	$query = "update  cliente_img  set image ='{$imgContent}' where id_cliente_img = {$id_cliente_img}";
		  }else{
		  $query = "insert into cliente_img (image, id_cliente) VALUES ('$imgContent', $id_cliente )";

		  }
		  mysqli_query($conexao,$query);
		  mysqli_close($conexao);
		  header("Location: ../clientes/clientes.php");
		}
	}else{
		echo mysqli_error($conexao);
	}