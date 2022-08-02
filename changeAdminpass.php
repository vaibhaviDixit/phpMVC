<?php

session_start();

require_once("model/adminModel.php");
$adminModel=new adminModel();

if(isset($_POST['oldPass']) && isset($_POST['newPass'])){


	$oldp=$_POST['oldPass'];
	$newp=$_POST['newPass'];

	$adminRow=$adminModel->getAdminDetails();
	$dbpass=$adminRow['pass'];

	if(password_verify($oldp,$dbpass)){
		$insertPass = password_hash($newp, PASSWORD_BCRYPT);
	    
		if($adminModel->updateAdminPass($insertPass)){
			$data = array("action"=>"success");	
		}
		echo json_encode($data);
	}
	else{
		$data = array("action"=>"fail");
		echo json_encode($data);
	}


}



?>