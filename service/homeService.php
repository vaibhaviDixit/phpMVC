<?php 
require_once("model/testimonialModel.php");
require_once("model/couponModel.php");
require_once("model/favoriteModel.php");
require_once("model/userModel.php");
require_once("model/adminModel.php");
require_once("model/enquiryModel.php");
require_once("service/packageService.php");

$testimonialModel=new testimonialModel();
$couponModel=new couponModel();
$favoriteModel=new favoriteModel();
$userModel=new userModel();
$adminModel=new adminModel();
$enquiryModel=new enquiryModel();

$testimonialsArray=$testimonialModel->getAllTestimonials();
$couponsArray=$couponModel->getAllCoupons();

$favArray=$favoriteModel->getFavourites();
$fav_count=count($favArray);
$currentUserDetails=$userModel->getCurrentUserDetails();

$adminSocial=$adminModel->getAdminDetails();


  if (isset($_POST['submitQuery'])) {
    if($enquiryModel->addEnquiry($_POST)>0){
    	alertMsg("Thank you for your response!");
    }
  }

if (isset($_POST['subscribe'])) {

    if($enquiryModel->subscribe($_POST['subscribe'])>0){

    	alertMsg("Thank you for your response!");
    }
}

?>