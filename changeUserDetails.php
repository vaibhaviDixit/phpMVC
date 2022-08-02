<?php

session_start();

require_once("model/userModel.php");

$userModel=new userModel();


if(isset($_POST['action']) && $_POST['action']=="check"){


		if($userModel->mobExists($_POST)){
			$arr=array("status"=>"error","msg"=>"Phone number already exists!");
		    echo json_encode($arr);
		}
		else{
		   $arr=array("status"=>"success","msg"=>"!!!");
		   echo json_encode($arr);
		}

}
	if(isset($_POST['action']) && $_POST['action']=="update"){
		
		if($userModel->updateUserDetails($_POST)>0){
		  $arr2=array("status"=>"success","msg"=>"!!!");
		   echo json_encode($arr2);
		}
		else{
		$arr2=array("status"=>"error","msg"=>"");
		   echo json_encode($arr2);
		}

	}




?>