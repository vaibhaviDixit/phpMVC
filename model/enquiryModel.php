<?php
require_once("model/database.php");

class enquiryModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getAllEnquiries(){
		$sql="select * from query order by id desc";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

	function addEnquiry($params=array()){
		$name="";
		if(isset($params['name'])){
			$name=$params['name'];
		}

		$data = [
		    'name' => $name,
		    'phone' => $params['phone'],
		    'query' => $params['query']
		];


		$sql="insert into query(name,phone,query) values(:name,:phone,:query) ";
		return $this->db_handle->runInsertQuery($sql,$data);


	}

	function subscribe($email){

		$data=[
			'email'=>$email
		];

		$sql="select * from subscription where email='$email'";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return 0;
		}
		else{
			$sql="insert into subscription(email) values(:email) ";
			return $this->db_handle->runInsertQuery($sql,$data);
		}

	}

	function getAllSubscribers(){
		$sql="select * from subscription";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}



	function enquiryExistsById($id){
		$sql="select * from query where id='$id'";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function getEnquiryById($id){
		$sql="select * from query where id='$id'";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0];
	}


	function updateEnquiry($id,$params=array()){

		
		$data = [
		    'name' => $params['name'],
		    'phone' => $params['phone'],
		    'query' => $params['query'],
		    'id'=> $id
		];


		$sql="update query set name=:name,phone=:phone,query=:query where id=:id";
		
		return $this->db_handle->runUpdateQuery($sql,$data);


	}

	function deleteEnquiry($id){
		$sql="delete from query where id='$id'";
		return $this->db_handle->runDeleteQuery($sql);
	}



}

?>