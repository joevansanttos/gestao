<?php

        // Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("../mailer/class.phpmailer.php");

        // Inicia a classe PHPMailer
$mail = new PHPMailer(true);

        // Define os dados do servidor e tipo de conexão
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsSMTP(); // Define que a mensagem será SMTP

        try {
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
             $mail->Subject = 'Teste de Email';//Assunto do e-mail


             //Define os destinatário(s)
             //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
             $mail->AddAddress('joevansanttos@gmail.com', 'Joevan Santos');

             //Campos abaixo são opcionais 
             //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
             //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
             //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
             //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


             $mail->Subject=("Assunto");
             $mail->msgHTML("Sua mensagem");
             if ($mail->send()){
               $ok = true;
             }else{
               $ok = false;
             }  
           }catch (phpmailerException $e) {
              echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
            }
            ?>