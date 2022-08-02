<?php 

require_once("model/enquiryModel.php");



$enquiryModel=new enquiryModel();
$enquiryArray=$enquiryModel->getAllEnquiries();

if(isset($_GET['id']) && $_GET['id']>0){
	$id=$_GET['id'];

    
    if($enquiryModel->enquiryExistsById($id)){
    	$enquiryRow=$enquiryModel->getEnquiryById($id);

    	$name=$enquiryRow['name'];
		$phone=$enquiryRow['phone'];
		$query=$enquiryRow['query'];
		$date=$enquiryRow['date'];

    }
	

}

if(isset($_POST['addEnquiry'])){


	if(!isset($_GET['id'])){
		$result=$enquiryModel->addEnquiry($_POST);
		if($result>0){
			redirect(SITE_PATH."?type=admin&page=enquiries");
		}
		else{
			alertMsg("coupon already exists");
		}

	}
	else{
		$result=$enquiryModel->updateEnquiry($id,$_POST);
		if($result==1){
			redirect(SITE_PATH."?type=admin&page=enquiries");
		}
		else{
			alertMsg("failed");
		}

	}

	
}




if(isset($_GET['oper']) && $_GET['oper']=="deletenquiry"){
	$result=$enquiryModel->deleteEnquiry($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=enquiries");
	}
	else{
		alertMsg("failed");
	}
}





?>