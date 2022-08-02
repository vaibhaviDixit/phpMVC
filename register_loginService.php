<?php

session_start();

require_once("model/userModel.php");
require_once("model/adminModel.php");

$userModel=new userModel();
$adminModel=new adminModel();

$type=$_POST['type'];


if($type=="register"){


		$email=$_POST['email'];

		if($userModel->emailExists($email)==true){

				$arr=array("status"=>"fail","msg"=>"Email already registered!");
		    	echo json_encode($arr);
		}
		else{
			print_r($_POST);
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
		
}

if($type=="login"){


		$email=$_POST['email'];
		$password=$_POST['password'];

		$user=$userModel->userCanLogin($email,$password);

		if($user>0){

			$_SESSION['CURRENT_USER_ID']=$userModel->getUserByEmail($email)['id'];
			$arr=array("status"=>"success","msg"=>"login successfully");
		    echo json_encode($arr);
		}
		else{
			$arr=array("status"=>"fail","msg"=>"Invalid Email or Password!");
		    echo json_encode($arr);

		}
		
}


if($type=="adminlogin"){
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];

		if ($adminModel->adminLogin($uname, $pass)) {
			$_SESSION['ADMIN']=$adminModel->adminId($uname, $pass);
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