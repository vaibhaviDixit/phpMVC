<?php 


require_once("model/favoriteModel.php");
require_once("model/userModel.php");
require_once("model/onlineBookingModel.php");
require_once("model/packagesModel.php");



$packagesModel=new packagesModel();
$favoriteModel=new favoriteModel();
$userModel=new userModel();
$onlineBookingModel=new onlineBookingModel();


$favArray=$favoriteModel->getFavourites();
$currentUserDetails=$userModel->getCurrentUserDetails();
$historyArray=$onlineBookingModel->getBookingsOfCurrentUser();

// update user profile image
if(isset($_FILES['userProfile'])){
  $type=$_FILES['userProfile']['type'];
  if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
        alertMsg("Invalid image format");
  }
  else{
  		$uid=$currentUserDetails['id'];
       if($userModel->updateUserProfile($uid,$_FILES)>0){
        redirect(SITE_PATH.'?page=profile');
      }
  }  
}

if(isset($_POST['updateUserDetails'])){
      if($userModel->updateUserDetails($_POST)>0){
        redirect(SITE_PATH.'?page=profile');
      } 
}


?>