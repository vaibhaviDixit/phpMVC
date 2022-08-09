<?php      

session_start();

require_once("model/testimonialModel.php");

$testimonialModel=new testimonialModel();

if(isset($_POST['stars']) && isset($_POST['msg'])){

if($testimonialModel->addReview($_POST) > 0){
	$arr=array("status"=>"success");
	echo json_encode($arr);
	die();
}else{
	$arr=array("status"=>"error");
	echo json_encode($arr);
	die();
}

}


?>