<?php 

require_once("include/strings.php");
require_once("service/couponService.php");
require_once("service/packageService.php");
require_once("service/offlineBookingService.php");
require_once("service/onlineBookingService.php");
require_once("service/enquiriesService.php");
require_once("service/categoryService.php");
require_once("service/emailService.php");
require_once("model/adminModel.php");


$adminModel=new adminModel();
$row=$adminModel->getAdminDetails();

//update admin details
if(isset($_POST['updateAdminDetails'])){
  
 
      if($adminModel->updateAdmin($_POST)>0){
        redirect(SITE_PATH.'?type=admin&page=profile');
      } 
}

// update admin profile image
if(isset($_FILES['updateAdminProfile'])){
  $type=$_FILES['adminProfile']['type'];
  if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
        alertMsg("Invalid image format");
  }
  else{
       if($adminModel->updateAdminProfile($_FILES)>0){
        redirect(SITE_PATH.'?type=admin&page=profile');
      }
  }  
}




?>