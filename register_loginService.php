<?php

session_start();

require_once('include/constants.inc.php');
require_once("model/userModel.php");
require_once("model/adminModel.php");
require_once("service/emailService.php");

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
	
			$id=$userModel->addUser($_POST);
			$email=$_POST['email'];
			$name=$_POST['name'];

			if($id>0){

				$userRow=$userModel->getUserByEmail($email);
				$token=$userRow['token'];
				
				$link=SITE_PATH."?page=login&token=$token";
				$emailBody="Hi $name, Click here to activate your account $link";
              
				if(email($email,$emailBody)){

					$_SESSION['reg_msg']="Email has been sent to $email...Activate your account";

					$arr=array("status"=>"success","msg"=>"Registered successfully!");
					echo json_encode($arr);
				}
				else{
			  		$arr=array("status"=>"fail","msg"=>"Please Try Again");
			   		echo json_encode($arr);
				}

			   	
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
			$_SESSION['LAST_ACTIVE_TIME']=time();
			
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
			$_SESSION['LAST_ACTIVE_TIME']=time();
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