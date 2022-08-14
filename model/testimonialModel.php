<?php
require_once("model/database.php");

class testimonialModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getAllTestimonials(){
		$sql="select reviews.*,reviews.id as rid, user.* from reviews,user where reviews.userId=user.id";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

	function addReview($params=array()){
        
        $uid=0;
		if(isset($_SESSION['CURRENT_USER_ID'])){
			$uid=$_SESSION['CURRENT_USER_ID'];
		}
		else{
			return 0;
		}

		$data = [
		    'uid' => $uid,
		    'msg' => $params['msg'],
		    'stars' => $params['stars']
		];

		$sql="INSERT INTO `reviews`( `userId`, `description`, `stars`) VALUES (:uid, :msg, :stars)";


		return $this->db_handle->runInsertQuery($sql,$data);
	}

	function deleteTestimonial($id){
		$sql="delete from reviews where id='$id' ";
		return $this->db_handle->runDeleteQuery($sql);
	}




}

?>