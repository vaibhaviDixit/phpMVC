<?php
require_once("model/database.php");

class testimonialModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getAllTestimonials(){
		$sql="select reviews.*, user.* from reviews,user where reviews.userId=user.id";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

	function addReview($uid,$params=array()){
		$stars=$params['stars'];
 		$msg=$params['msg'];
		$sql="INSERT INTO `reviews`( `userId`, `description`, `stars`) VALUES ('$uid','$msg','$stars')";
		return $this->db_handle->runInsertQuery($sql);
	}


}

?>