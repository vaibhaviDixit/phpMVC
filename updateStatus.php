<?php
session_start();

require_once("service/emailService.php");
require_once("model/onlineBookingModel.php");
$onlineBookingModel=new onlineBookingModel();


$id=$_POST['confirmid'];
$emailid=$_POST['emailid'];

$cnf=$onlineBookingModel->confirmBooking($id);
if($cnf>0){
	$arr=array("status"=>"success");
	// send email acknowledgement to user about approval of booking...
	$text="Your booking has been approved<br>Check your user panel";
	
	email($emailid,$text);
    echo json_encode($arr);
}
else{
	$arr=array("status"=>"fail");
    echo json_encode($arr);
}				  
				  
				   

?>
