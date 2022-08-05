<?php
require_once("model/database.php");

class favoriteModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getFavourites(){
		    $fav_array=array(); //store fav

			if(isset($_SESSION['CURRENT_USER_ID'])){
			  //if user is logged in get fav of user from database
			  $getUserFav=$this->getUserFavFromDb();
           
			  foreach ($getUserFav as $key => $value) {

			   	$fav_array[]= array(
			        'pckgId'=>$value['pckgId']
			    );

			  }
			 
			}
			else{

			  //if user is not logged in then get cart from session
			  if (isset($_SESSION['favourites']) && count($_SESSION['favourites'])>0) {
			    $fav_array=$_SESSION['favourites'];
			  }

			}
			return $fav_array;
	}

	function getUserFavFromDb(){

		$uid=0;
		if(isset($_SESSION['CURRENT_USER_ID'])){
			$uid=$_SESSION['CURRENT_USER_ID'];
		}
		
		$sql="select * from favourites where userId='$uid' ";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;

	}





}

?>