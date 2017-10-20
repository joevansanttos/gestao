<?php
  
  require_once "../bancos/conecta.php";
  require_once "../bancos/banco-macroprocesso.php";
  require_once "../bancos/banco-stakeholders.php";
  // Inclui o arquivo class.phpmailer.php localizado na pasta class
  require_once("../mailer2/PHPMailerAutoload.php");

  $id_macroprocesso = $_GET['id_macroprocesso'];
  $macro = buscaMacroprocessoId($conexao, $id_macroprocesso);
  $cod_pi = $macro['cod_pi'];
  $stakeholders = listaStakeholdersMacroprocessos($conexao, $id_macroprocesso);
  $mensagem = $_GET['mensagem'];
  $assunto = $_GET['assunto'];

  // Inicia a classe PHPMailer
  $mail = new PHPMailer(true);

  // Define os dados do servidor e tipo de conexão
  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  $mail->IsSMTP(); // Define que a mensagem será SMTP

  try {

    foreach ($stakeholders as $stakeholder) {
      $mail->SMTPDebug  = 1; 
      $mail->SMTPAuth = true;     // Autenticação ativada
      $mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
      $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
      $mail->Port = 465;
      $mail->Username = 'joevansantos.projek@gmail.com'; // Usuário do servidor SMTP (endereço de email)
      $mail->Password = 'Projek@90'; // Senha do servidor SMTP (senha do email usado)

      //Define o remetente
      // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
      $mail->SetFrom('joevansantos.projek@gmail.com', 'Projek'); //Seu e-mail
      $mail->AddReplyTo('joevansantos.projek@gmail.com', 'Projek'); //Seu e-mail
      if (!empty($assunto)) {
          $mail->Subject = "Projek -  $assunto";
        }
        else { 
          $mail->Subject = "Projek";
        }


      //Define os destinatário(s)
      //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
      $mail->AddAddress($stakeholder['email'], $stakeholder['nome']);

      //Campos abaixo são opcionais 
      //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
      //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
      //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
      //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


      $mail->msgHTML($mensagem);
      $mail->CharSet = 'UTF-8';

      $mail->send();
    }
   
 }catch (phpmailerException $e) {
    echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
  }

  header("Location: ../profiles/pi-profile.php?cod_pi=$cod_pi");

?>