<?php 

require_once("model/userModel.php");
$userModel=new userModel();

if(isset($_GET['token'])){
	$token=$_GET['token'];

	$activate=$userModel->activateAcc($token);

	if($activate>0){

		if(isset($_SESSION['reg_msg'])){
			$_SESSION['reg_msg']="Account activated Successfully! Login to proceed";
		}
	}
	else{
		$_SESSION['reg_msg']="Failed to activate Account!";
	}

}

?>

