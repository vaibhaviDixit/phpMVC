<?php

session_start();
require_once("model/userModel.php");
require_once("model/adminModel.php");

$userModel=new userModel();
$adminModel=new adminModel();

include ('layout/include/constants.inc.php');
include ('layout/include/functions.inc.php');

$type=$_POST['type'];

if($type=="signUp"){


		$id=$userModel->addUser($_POST);

		if($id>0){
			$arr=array("status"=>"success","msg"=>"Registered successfully!");
			$_SESSION['CURRENT_USER_ID']=$id;
		   	echo json_encode($arr);
		}
		else{
		  $arr=array("status"=>"fail","msg"=>"Please Try Again");
		   echo json_encode($arr);
		}


}

if($type=="checkMobile"){

		$mobile=$_POST['mobile'];
		if($userModel->mobileExists($mobile)==true){
			$arr=array("status"=>"success","msg"=>"Enter OTP sent to ".$mobile);
		    echo json_encode($arr);
		}
		else{
			$arr=array("status"=>"fail","msg"=>"Mobile no. not registered ");
		    echo json_encode($arr);

		}
	
}

if($type=="checkMbEmail"){


		$mobile=$_POST['mobile'];
		$email=$_POST['email'];

		if($userModel->mobileExists($mobile)==true || $userModel->emailExists($email)==true){
			if($userModel->mobileExists($mobile)==true){
				$arr=array("fail"=>"success","msg"=>"Mobile already registered!");
		    	echo json_encode($arr);
			}
			if($userModel->emailExists($email)==true){
				$arr=array("fail"=>"success","msg"=>"Email already registered!");
		    	echo json_encode($arr);
			}
	
		}
		else{
			$arr=array("status"=>"success","msg"=>"Register successfully!");
		    echo json_encode($arr);
		}
		
}

if($type=="login"){


		$mobile=$_POST['mobile'];
		if($userModel->mobileExists($mobile)==true && $userModel->getUserByMob($mobile)>0){

			$_SESSION['CURRENT_USER_ID']=$userModel->getUserByMob($mobile);
			$arr=array("status"=>"success","msg"=>"login successfully");
		    echo json_encode($arr);
		}
		else{
			$arr=array("status"=>"fail","msg"=>"Unable to login!");
		    echo json_encode($arr);

		}
		
}


if($type=="adminlogin"){
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];

		if ($adminModel->adminLogin($uname, $pass)) {
			$_SESSION['ADMIN']=$row['id'];
			$arr=array("status"=>"success","msg"=>"login successfully");
			echo json_encode($arr);
		} else {
			$arr=array("status"=>"fail","msg"=>"Invalid username or password!");
			echo json_encode($arr);
		}

		
}

if($type=="regUsingGmail"){


       if($userModel->emailExists($email)==true){

				$_SESSION['CURRENT_USER_ID']=$userModel->getUserByEmail($email);
       		    $arr=array("status"=>"success","msg"=>"Login successfully!");
			    echo json_encode($arr);
       }else{

			$id=$userModel->addUserByGmail($_POST);

			if($id>0){
				$arr=array("status"=>"success","msg"=>"Registered successfully!");
				$_SESSION['CURRENT_USER_ID']=$id;
			   echo json_encode($arr);
			}
			else{

			  $arr=array("status"=>"fail","msg"=>"Please Try Again");
			   echo json_encode($arr);
			}
       }

}

?>