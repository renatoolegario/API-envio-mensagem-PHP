<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->SetLanguage('br');
$mail->CharSet='UTF=8';
$arquivo = file_get_contents('../modelos/modelo_01.html');

    try {
    	    $mail->isSMTP();
    	    $mail->Host = 'smtp.hostinger.com';
    	    $mail->SMTPAuth = true;
    	    $mail->SMTPSecure = 'ssl';              // sets the prefix to the servier
    	    $mail->Username = 'exemplo@multiplasfr.com.br';
    	    $mail->Password = '123456';
    	    $mail->Port = 465;
    		//$mail->setFrom('renatoolegario@multiplasfr.com.br');  //caso queira replicar o email para um outro email
    		$mail->addAddress('email_destinatario@multiplasfr.com.br');
			$mail->isHTML(true);
            $mail->Subject = 'Seja muito bem vindo(a) a MultiplasFR.';  
            $mail->Body = $arquivo;
			
    	    $mail->isHTML(true);
    	    $mail->send(); 
		 
	    
	} 
	   
	   

   