<?php

require_once("model/offlineBookingModel.php");
$offlineBookingModel=new offlineBookingModel();

$payDues=$offlineBookingModel->getPaymentDues();
$offlineBookingArray=$offlineBookingModel->getAllOfflineBookings();
$getAllPaymentDues=$offlineBookingModel->getAllPaymentDues();

$offlineBookingModel->getMonthWiseEarn();


if(isset($_GET['id']) && $_GET['id']>0){
	$id=$_GET['id'];

    
    if($offlineBookingModel->bookingExistsById($id)){
    	$packageRow=$offlineBookingModel->getBookingById($id);

    		$name=$packageRow['name'];
		    $phone=$packageRow['phone'];
		    $address=$packageRow['address'];
		    $packageId=$packageRow['packageId'];
		    $checkIn=$packageRow['checkIn'];
		    $checkOut=$packageRow['checkOut'];
		    $payMode=$packageRow['payMode'];
		    $adults=$packageRow['adults'];
		    $children=$packageRow['children'];
		    $packagePrice=$packageRow['packagePrice'];
		    $subTotal=$packageRow['subTotal']; 
		    $discount=$packageRow['discount']; 
		    $total=$packageRow['total']; 
		    $paid=$packageRow['paid']; 
		    $rem=$packageRow['rem']; 

    }
	

}

if(isset($_POST['addOfflineBooking'])){


	if(!isset($_GET['id'])){
		$result=$offlineBookingModel->addOfflineBooking($_POST);
		if($result>0){
			redirect(SITE_PATH."?type=admin&page=ListBooking");
		}
		else{
			alertMsg("coupon already exists");
		}

	}
	else{
		$result=$offlineBookingModel->updateOfflineBooking($id,$_POST);
		if($result==1){
			redirect(SITE_PATH."?type=admin&page=ListBooking");
		}
		else{
			alertMsg("failed");
		}

	}

	
}




?>