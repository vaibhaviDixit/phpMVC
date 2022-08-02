<?php
require_once("model/database.php");

class adminModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}


	function adminLogin($uname,$pass){

		$sql="select * from admin where name='$uname' ";
		$result=$this->db_handle->runBasicQuery($sql);

		if(count($result)>0){
			if (password_verify($pass, $result[0]['pass'])){
				return true;
			}
		}
		return false;
	}


	function adminId($uname,$pass){

		$sql="select * from admin where name='$uname' ";
		$result=$this->db_handle->runBasicQuery($sql);

		if(count($result)>0){
			if (password_verify($pass, $result[0]['pass'])){
				return $result[0]['id'];
			}
		}
		return 0;
	}


	function getAdminDetails(){
		$sql="select * from admin";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0];
		
	}


	function updateAdmin($params=array()){

		  $adminName=$params['adminName'];
		    $adminPhone=$params['adminPhone'];
		    $adminLocation=$params['adminLocation'];
		    $adminEmail=$params['adminEmail'];
		    $adminWeb=$params['adminWeb'];
		    $adminFb=$params['adminFb'];
		    $adminInsta=$params['adminInsta'];
		    $adminWh=$params['adminWh'];
		    $adminYt=$params['adminYt'];


		$sql="update `admin` set `name`='$adminName', `email`='$adminEmail', `phone`='$adminPhone', `address`='$adminLocation',`website`='$adminWeb',`fb`='$adminFb',`insta`='$adminInsta',`whatsapp`='$adminWh',`youtube`='$adminYt' ";
		
		return $this->db_handle->runUpdateQuery($sql);


	}

	function updateAdminProfile($file=array()){
		 $adminDetails=$this->getAdminDetails();
		 $oldprofile=$adminDetails['profile'];
		 if($oldprofile!=""){
		 	unlink(SERVER_PROFILE_IMAGE.$oldprofile);
		 }

		 $adminProfile=rand(111111111,999999999).'_'.$file['adminProfile']['name'];
         $isupload=move_uploaded_file($file['adminProfile']['tmp_name'],SERVER_PROFILE_IMAGE.$adminProfile);

         if($isupload){

         	$sql="update admin set profile='$adminProfile'";
			return $this->db_handle->runUpdateQuery($sql);
         }
         return 0;
	}


	function updateAdminPass($pass){

		$sql="update admin set pass='$pass' ";
		
		return $this->db_handle->runUpdateQuery($sql);


	}
	

}

?>