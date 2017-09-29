<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-pis.php";?>
<?php
require_once("../../../vendors/PHPMailer/src/PHPMailer.php");
$cod_pi = $_GET['cod_pi'];
$pi = buscaPi($conexao, $cod_pi);
$stakeholders = listaStakeholdersPi($conexao, $cod_pi);
foreach ($stakeholders as $stakeholder) {
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->SMTPAuth = true;

}