<?php 

require_once("model/couponModel.php");



$couponModel=new couponModel();
$couponArray=$couponModel->getAllCoupons();

if(isset($_GET['id']) && $_GET['id']>0){
	$id=$_GET['id'];

    
    if($couponModel->couponExistsById($id)){
    	$couponRow=$couponModel->getCouponById($id);

    	$couponCode=$couponRow['couponCode'];
		$couponType=$couponRow['couponType'];
		$couponValue=$couponRow['couponValue'];
		$minValue=$couponRow['minValue'];
		$expiredOn=$couponRow['expiredOn'];

    }
	

}

if(isset($_POST['addCoupon'])){


	if(!isset($_GET['id'])){
		$result=$couponModel->addCoupon($_POST);
		if($result>0){
			redirect(SITE_PATH."?type=admin&page=ListCoupon");
		}
		else{
			alertMsg("coupon already exists");
		}

	}
	else{
		$result=$couponModel->updateCoupon($id,$_POST);
		if($result==1){
			redirect(SITE_PATH."?type=admin&page=ListCoupon");
		}
		else{
			alertMsg("failed");
		}

	}

	
}




if(isset($_GET['oper']) && $_GET['oper']=="deletecoupon"){
	$result=$couponModel->deleteCoupon($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=ListCoupon");
	}
	else{
		alertMsg("failed");
	}
}

if(isset($_GET['oper']) && $_GET['oper']=="activecoupon"){
	$result=$couponModel->activeCoupon($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=ListCoupon");
	}
	else{
		alertMsg("failed");
	}
}


if(isset($_GET['oper']) && $_GET['oper']=="deactivecoupon"){
	$result=$couponModel->deactiveCoupon($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=ListCoupon");
	}
	else{
		alertMsg("failed");
	}
}



?>