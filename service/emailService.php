<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';




function email($email,$message){

	$from = "testingsoftwares10@gmail.com"; // your mail here
	$mail = new PHPMailer();
	try {

	    $mail->isSMTP();                                            
	    $mail->Host       = 'smtp.gmail.com';                     
	    $mail->SMTPAuth   = "true";     
	    $mail->SMTPSecure = "tls";                              
	    $mail->Username   = $from;                     
	    $mail->Password   = 'etfpyzvmvkoioeeh';                               
	    $mail->Port       = "587";                                    
	    $mail->setFrom($from);
	    $mail->addAddress($from);
	    $mail->addReplyTo($email);
	    $mail->isHTML(true);                                  
	    $mail->Subject ="Message from ImperiousTours";
	    $mail->Body    = $message;
	    
	    if($mail->send()){
	      return true;
	    }
	    
	} catch (Exception $e) {
		return false;
	}

}


?>