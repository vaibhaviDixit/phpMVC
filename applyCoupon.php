<?php
session_start();
require_once("model/couponModel.php");
$couponModel=new couponModel();


$coupon=$_POST['coupon'];
$bookPrice=$_POST['bookPrice'];

if($couponModel->couponExists($coupon)){
    
    $couponRow=$couponModel->getCouponByCode($coupon);
	$couponType=$couponRow['couponType'];
	$couponValue=$couponRow['couponValue'];
	$minValue=$couponRow['minValue'];
	$expiredOn=$couponRow['expiredOn'];


	if($bookPrice<$minValue){
		$arr=array("status"=>"error","msg"=>"Coupon need minimum value of booking: ".$minValue);
	}else{
		$date=strtotime(date('Y-m-d'));
	   if($date>strtotime($expiredOn)){
			$arr=array("status"=>"error","msg"=>"Coupon code has expired!");
		}else{

			$couponApplied=0;
			if($couponType=="r"){
				$couponApplied=$bookPrice-$couponValue;
			}
			if($couponType=="p"){
				$couponApplied=$bookPrice-$bookPrice*($couponValue/100);
			}

			$arr=array("status"=>"success","msg"=>"Coupon Code Applied!","couponApplied"=>$couponApplied);
		}
	}


}
else{

	$arr=array("status"=>"error","msg"=>"Coupon Code does not exist");

}
echo json_encode($arr);









?>