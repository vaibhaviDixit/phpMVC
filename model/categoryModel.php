<?php
require_once("model/database.php");

class categoryModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getAllCategories(){
		$sql="select * from category order by id desc";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

	function addCategory($params=array()){
		$category=$params['category'];
	    $description=$params['description'];


		$sql="insert into category(name,description,status) values('$category','$description',1)";
		return $this->db_handle->runInsertQuery($sql);


	}

	function categoryExists($couponCode){
		$sql="select * from category where name='$category' ";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function categoryExistsById($id){
		$sql="select * from category where id='$id' ";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function getCategoryById($id){
		$sql="select * from category where id='$id' ";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0];
	}


	function updateCategory($id,$params=array()){

		$category=$params['category'];
	   	$description=$params['description'];

		$sql="update category set name='$category', description='$description' where id='$id'  ";
		
		return $this->db_handle->runUpdateQuery($sql);


	}

	function deleteCategory($id){
		$sql="delete from category where id='$id'";
		return $this->db_handle->runDeleteQuery($sql);
	}

	function activeCategory($id){
		$sql="update category set status='1' where id='$id'";
		return $this->db_handle->runDeleteQuery($sql);
	}

	function deactiveCategory($id){
		$sql="update category set status='0' where id='$id'";
		return $this->db_handle->runDeleteQuery($sql);
	}



}

?>