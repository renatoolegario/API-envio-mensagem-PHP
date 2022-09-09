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
            $mail->Body = "
			Olá, seja muito bem vindo.</br>
			Fico feliz que esteja em busca de novos conteúdos.</br>
			</br>
			E devido a isso, eu irei creditar um valor de R$ 30,00 para adiquirir aulas na plataforma MultiplasFR.</br>
			Para isso seu usuário e senha provisórios são:</br>
			E-mail de acesso:<strong> </strong> </br>
			Senha de acesso:<strong> </strong> </br>
			</br>
			Obrigado, Renato Olegário.
			
			";
			
    	    $mail->isHTML(true);
    	    $mail->send(); 
		 
	    
	} 
	   
	   

   