<?php

require_once("model/enquiryModel.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$enquiryModel=new enquiryModel();


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
	      echo json_encode(array("success"=>true));
	      die();
	    }
	    else{
	       echo json_encode(array("success"=>false));
	      die();
	    }
	    
	} catch (Exception $e) {

	}

}

function emailToAllSubs($text){
	$arr=$enquiryModel->getAllSubscribers();
	if(count($arr)>0){
		foreach ($arr as $emails) {
			email($emails['email'],$text);
		}
	}
}

?>