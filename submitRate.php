<?php      

session_start();

require_once("model/userModel.php");

$userModel=new userModel();

if(isset($_POST['stars']) && isset($_POST['msg'])){

if($userModel->addRatings($_POST) > 0){
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