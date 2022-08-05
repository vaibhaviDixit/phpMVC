<?php

require_once("model/onlineBookingModel.php");
require_once("model/packagesModel.php");


$onlineBookingModel=new onlineBookingModel();
$packagesModel=new packagesModel();
$onlineBookingArray=$onlineBookingModel->getAllOnlineBookings();

if(isset($_POST['bookOnline'])){
	
	$result=$onlineBookingModel->addOnlineBooking($_POST);
	if($result){
		return true;
	}
	return false;
	
}




?>