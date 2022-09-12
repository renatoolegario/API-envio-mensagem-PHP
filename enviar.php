<?php

require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/SMTP.php');
require_once('PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$destinatario       = $_POST['destinatario'];
$smtp               = $_POST['smtp']; 
$porta_smtp         = $_POST['porta_smtp']; // 
$email_de_disparo   = $_POST['email_de_disparo']; // 
$senha_email_disparo= $_POST['senha_email_disparo']; 
$nome_titulo_email  = $_POST['nome_titulo_email']; 

$titulo_email       = $_POST['titulo_email']; 
$corpo_email        = $_POST['corpo_email']; 

$body               = file_get_contents($corpo_email);

// aqui inicia-se as variávies do conteudo do anexo.


// fim das variáveis 
// Aqui inicia-se a substituição das variavies do anexo pelos POST recebidos.


//Fim das substituições



$mail = new PHPMailer(true);
$mail->SetLanguage('br');
$mail->CharSet='UTF=8';
$mail->isSMTP();
$mail->Host = $smtp; 
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';              // sets the prefix to the servier
$mail->Username = $email_de_disparo;
$mail->Password = $senha_email_disparo;
$mail->Port = $porta_smtp;
$mail->isHTML(true);
$mail->setFrom($email_de_disparo,$nome_titulo_email);
$mail->addAddress($destinatario);     
$mail->Subject = $titulo_email;  
$mail->Body = $body;        
        
       
       	try {
				$mail->send();
				echo "Código enviado com sucesso.";
			} catch (Exception $e) {
			    echo "Mailer error: " . $mail->ErrorInfo;
			}
        
      
       

 //$msg_retorno = "Mensagem enviada com sucesso!.";
?>

