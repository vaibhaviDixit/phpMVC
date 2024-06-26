<?php
require_once("model/database.php");

class userModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	//register user by form
	function addUser($params=array()){


			$data=[

				'name'=>$params['name'],
				'email'=>$params['email'],
				'password'=>password_hash($params['password'], PASSWORD_DEFAULT),
    			'profile'=>'default.png',
				'token'=>bin2hex(random_bytes(15))
			];

			
			$sql="INSERT INTO `user`(`name`, `email`, `password`,`profile`,`token`) VALUES (:name,:email,:password,:profile,:token) ";

			return $this->db_handle->runInsertQuery($sql,$data);


	}

	function activateAcc($token){
		$data=[
         	'token'=>$token
         ];
		$sql="update user set active=1 where token=:token";	
		return $this->db_handle->runUpdateQuery($sql,$data);
	}

	//register user by gmail
	function addUserByGmail($params=array()){

		$data=[
			'name'=>$params['name'],
			'email'=>$params['email'],
			'profile'=>$params['profile']
		];

			$sql="INSERT INTO `user`(`name`, `email`, `profile`) VALUES (:name,:email,:profile)";

			return $this->db_handle->runInsertQuery($sql,$data);


	}

	function mobileExists($mobile){
		$sql="select * from user where mobile='$mobile'";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function emailExists($email){
		$sql="select * from user where email='$email'";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function mobExists($params=array()){
		$phone=$params['userPhone'];
		$uid=0;
		if(isset($_SESSION['CURRENT_USER_ID'])){
			$uid=$_SESSION['CURRENT_USER_ID'];
		}

		$sql="select * from user where mobile='$phone' and id<>'$uid' ";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function userCanLogin($email,$pass){

		$result=$this->getUserByEmail($email);
		
		if(count($result)>0){

			$dbpassword=$result['password'];
			if (password_verify($pass, $dbpassword)){
				return 1;
			}
		}
		return 0;

	}

	function getUserByMob($mobile){
		$sql="select * from user where mobile='$mobile'";
		$result=$this->db_handle->runBasicQuery($sql);
	   return $result[0];
	}

	function getUserByEmail($email){
		$sql="select * from user where email='$email' and active=1";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			 return $result[0];
		}
		return $result;
	   
	}


	function getInactiveUserByEmail($email){
		$sql="select * from user where email='$email'";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			 return $result[0];
		}
		return $result;
	   
	}

	function getCurrentUserDetails(){
		if(isset($_SESSION['CURRENT_USER_ID'])){
			$id=$_SESSION['CURRENT_USER_ID'];
			$sql="select * from user where id='$id'";
			$result=$this->db_handle->runBasicQuery($sql);
	    	return $result[0];
		}
		
	}

	function updateUserProfile($uid,$file=array()){

		$userDetails=$this->getCurrentUserDetails();
		 $oldprofile=$userDetails['profile'];
		 
		 if($oldprofile!=""){
		 	unlink(SERVER_PROFILE_IMAGE.$oldprofile);
		 }

		 $userProfile=rand(111111111,999999999).'_'.$file['userProfile']['name'];
         $isupload=move_uploaded_file($file['userProfile']['tmp_name'],SERVER_PROFILE_IMAGE.$userProfile);

         $data=[

         	'profile'=>$userProfile,
         	'uid'=>$uid

         ];

         if($isupload){

         	$sql="update user set profile=:userProfile where id=:uid ";
			return $this->db_handle->runUpdateQuery($sql,$data);
         }
         return 0;

	}

	function updateUserDetails($params=array()){

		$data=[

				'name'=>$params['userName'],
				'address'=>$params['userAddress'],
				'phone'=>$params['userPhone'],
    			'uid'=>$_SESSION['CURRENT_USER_ID']
	   ];

        
		$sql="update user set name=:name,address=:address,mobile=:phone where id=:uid";
		
		return $this->db_handle->runUpdateQuery($sql,$data);


	}

	

}

?>