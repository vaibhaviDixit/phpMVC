<?php
require_once("model/database.php");

class homeModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getAllTestimonials(){
		$sql="select reviews.*, user.* from reviews,user where reviews.userId=user.id";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

}

?>