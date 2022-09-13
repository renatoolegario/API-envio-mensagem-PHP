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
$identificador_msg  = $_POST['codigo_identificador'];
$url_webhook        = $_POST['url_webhook']; // será aqui que será enviado o disparo da desiscrição via cliente // LINK_API_DESISCRICAO

$body               = file_get_contents($corpo_email);

// aqui inicia-se as variávies do conteudo do anexo.
$ITEM_01_LISTAGEM 				= $_POST['ITEM_01_LISTAGEM'];
$ITEM_02_LISTAGEM 				= $_POST['ITEM_02_LISTAGEM'];
$ITEM_03_LISTAGEM 				= $_POST['ITEM_03_LISTAGEM'];
$ITEM_04_LISTAGEM 				= $_POST['ITEM_04_LISTAGEM'];
$ITEM_05_LISTAGEM 				= $_POST['ITEM_05_LISTAGEM'];
$ITEM_06_LISTAGEM 				= $_POST['ITEM_06_LISTAGEM'];
$ITEM_07_LISTAGEM 				= $_POST['ITEM_07_LISTAGEM'];
$ITEM_08_LISTAGEM 				= $_POST['ITEM_08_LISTAGEM'];
$ITEM_09_LISTAGEM 				= $_POST['ITEM_09_LISTAGEM'];
$DESCRICAO_ABAIXO_LISTA 			= $_POST['DESCRICAO_ABAIXO_LISTA'];
$TITULO_DESCRICAO_1 				= $_POST['TITULO_DESCRICAO_1'];
$DESCRICAO_1 					= $_POST['DESCRICAO_1'];
$TITULO_DESCRICAO_2 				= $_POST['TITULO_DESCRICAO_2'];
$DESCRICAO_2 					= $_POST['DESCRICAO_2'];
$TITULO_DESCRICAO_3 				= $_POST['TITULO_DESCRICAO_3'];
$DESCRICAO_3 					= $_POST['DESCRICAO_3'];
$TITULO_DESCRICAO_4 				= $_POST['TITULO_DESCRICAO_4'];
$DESCRICAO_4 					= $_POST['DESCRICAO_4'];
$TITULO_DESCRICAO_5 				= $_POST['TITULO_DESCRICAO_5'];
$DESCRICAO_5 					= $_POST['DESCRICAO_5'];
$DESCRICAO_FINAL 				= $_POST['DESCRICAO_FINAL'];
$LINK_BT_1 					= $_POST['LINK_BT_1'];
$IMG_BT_1 					= $_POST['IMG_BT_1'];
$DESCRICAO_BT_1 				= $_POST['DESCRICAO_BT_1'];
$LINK_BT_2 					= $_POST['LINK_BT_2'];
$IMG_BT_2 					= $_POST['IMG_BT_2'];
$DESCRICAO_BT_2 				= $_POST['DESCRICAO_BT_2'];
$LINK_BT_3 					= $_POST['LINK_BT_3'];
$DESCRICAO_BT_3 				= $_POST['DESCRICAO_BT_3'];
$LINK_BANNER_BOTTOM 				= $_POST['LINK_BANNER_BOTTOM'];
$IMG_BANNER_BOTTOM 				= $_POST['IMG_BANNER_BOTTOM'];
$NOME_DA_EMPRESA 				= $_POST['NOME_DA_EMPRESA'];
$FRASE_DA_EMPRESA 				= $_POST['FRASE_DA_EMPRESA'];

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

