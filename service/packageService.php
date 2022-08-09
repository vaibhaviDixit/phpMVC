<?php 

require_once("model/packagesModel.php");
require_once("service/emailService.php");
require_once("model/enquiryModel.php");


$enquiryModel=new enquiryModel();
$packagesModel=new packagesModel();
$packagesArray=$packagesModel->getActivePackages();
$allPackages=$packagesModel->getAllPackages();
$noofPackages=count($packagesArray);


$image_status='required';
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=$_GET['id'];

    
    if($packagesModel->packageExistsById($id)){
    	$row=$packagesModel->getpackageById($id);
    	$packageName=$row['packageName'];
		$packagePrice=$row['packagePrice'];
		$packageDesc=$row['packageDesc'];
		$packageDuration=$row['packageDuration'];
		$packageLocation=$row['packageLocation'];
		$packageDis=$row['discount'];
		$packageDisType=$row['disType'];
		$image_status="";


    }
	

}

if(isset($_POST['addPackage'])){


	if(!isset($_GET['id'])){
		
			$result=$packagesModel->addPackage($_FILES,$_POST);
			if($result>0){

				$text="Explore new package : <b>".$_POST['packageName'];

				$arr=$enquiryModel->getAllSubscribers();
				if(count($arr)>0){
					foreach ($arr as $emails) {
						email($emails['email'],$text);
					}
				}
				
				redirect(SITE_PATH."?type=admin&page=ListElement");
			}
			else{
				alertMsg("Failed");
			}

	}
	else{
		
			$result=$packagesModel->updatePackage($id,$_FILES,$_POST);
			if($result==1){
				redirect(SITE_PATH."?type=admin&page=ListElement");
			}
			else{
				alertMsg("failed");
			}
	}

	
}




if(isset($_GET['oper']) && $_GET['oper']=="deletepackage"){
	$result=$packagesModel->deletePackage($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=ListElement");
	}
	else{
		alertMsg("failed");
	}

}




if(isset($_GET['oper']) && $_GET['oper']=="activepackage"){
	$result=$packagesModel->activePackage($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=ListElement");
	}
	else{
		alertMsg("failed");
	}
}


if(isset($_GET['oper']) && $_GET['oper']=="deactivepackage"){
	$result=$packagesModel->deactivePackage($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=ListElement");
	}
	else{
		alertMsg("failed");
	}
}



?>