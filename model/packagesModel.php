<?php
require_once("model/database.php");

class packagesModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getAllPackages(){
		$sql="select * from package order by id desc";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

	function getActivePackages(){
		$sql="select * from package where status=1 order by id desc";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

	function addPackage($file=array(),$params=array()){

		$data=[	

			'packageName'=>$params['packageName'],
			'packageDesc'=>$params['packageDesc'],
			'packagePrice'=>$params['packagePrice'],
		 	'packageLocation'=>$params['packageLocation'],
		 	'packageDuration'=>$params['packageDuration'],
		    'packageDis'=>$params['packageDis'],
		    'packageDisType'=>$params['packageDisType']

		];


		$img1=rand(111111111,999999999).'_'.$file['img1']['name'];
		$upload1=move_uploaded_file($file['img1']['tmp_name'],SERVER_PACKAGE_IMAGE.$img1);

		$img2=rand(111111111,999999999).'_'.$file['img2']['name'];
		$upload2=move_uploaded_file($file['img2']['tmp_name'],SERVER_PACKAGE_IMAGE.$img2);

		$img3=rand(111111111,999999999).'_'.$file['img3']['name'];
		$upload3=move_uploaded_file($file['img3']['tmp_name'],SERVER_PACKAGE_IMAGE.$img3);

		$img4=rand(111111111,999999999).'_'.$file['img4']['name'];
		$upload4=move_uploaded_file($file['img4']['tmp_name'],SERVER_PACKAGE_IMAGE.$img4);

		$img5=rand(111111111,999999999).'_'.$file['img5']['name'];
		$upload5=move_uploaded_file($file['img5']['tmp_name'],SERVER_PACKAGE_IMAGE.$img5);

		$img6=rand(111111111,999999999).'_'.$file['img6']['name'];
		$upload6=move_uploaded_file($file['img6']['tmp_name'],SERVER_PACKAGE_IMAGE.$img6);


		if($upload1 && $upload2 && $upload3 && $upload4 && $upload5 && $upload6){

			$sql="INSERT INTO `package`(`packageName`, `packageDesc`, `packagePrice`, `packageLocation`,`packageDuration`,`discount`, `disType`,`img1`,`img2`,`img3`,`img4`,`img5`,`img6`) VALUES (:packageName,:packageDesc,:packagePrice,:packageLocation,:packageDuration,:packageDis,:packageDisType,'$img1','$img2','$img3','$img4','$img5','$img6')";

			return $this->db_handle->runInsertQuery($sql,$data);

		}
		return 0;

	}


	function getpackageById($id){
		$sql="select * from package where id='$id' ";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0];
	}

	function packageExistsById($id){
		$sql="select * from package where id='$id'";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}


	function updatePackage($id,$file=array(),$params=array()){
		$data=[	

			'packageName'=>$params['packageName'],
			'packageDesc'=>$params['packageDesc'],
			'packagePrice'=>$params['packagePrice'],
		 	'packageLocation'=>$params['packageLocation'],
		 	'packageDuration'=>$params['packageDuration'],
		    'packageDis'=>$params['packageDis'],
		    'packageDisType'=>$params['packageDisType'],
		    'id'=>$id

		];

	    $image_condition="";

	    if($file['img1']['name']!=""){
	    	   $img1=rand(111111111,999999999).'_'.$file['img1']['name'];
				$isupload1=move_uploaded_file($file['img1']['tmp_name'],SERVER_PACKAGE_IMAGE.$img1);

				if($isupload1){
						$this->removePackageImage($id,"img1");
						$image_condition.=", img1='$img1' ";
				}
	    }

	    if($file['img2']['name']!=""){
	    	   $img2=rand(111111111,999999999).'_'.$file['img2']['name'];
				$isupload2=move_uploaded_file($file['img2']['tmp_name'],SERVER_PACKAGE_IMAGE.$img2);

				if($isupload2){
						$this->removePackageImage($id,"img2");
						$image_condition.=", img2='$img2' ";
				}
	    }

	    if($file['img3']['name']!=""){
	    	   $img3=rand(111111111,999999999).'_'.$file['img3']['name'];
				$isupload3=move_uploaded_file($file['img3']['tmp_name'],SERVER_PACKAGE_IMAGE.$img3);

				if($isupload3){
						$this->removePackageImage($id,"img3");
						$image_condition.=", img3='$img3' ";
				}
	    }


	    if($file['img4']['name']!=""){
	    	   $img4=rand(111111111,999999999).'_'.$file['img4']['name'];
				$isupload4=move_uploaded_file($file['img4']['tmp_name'],SERVER_PACKAGE_IMAGE.$img4);

				if($isupload4){
						$this->removePackageImage($id,"img4");
						$image_condition.=", img4='$img4' ";
				}
	    }

	    if($file['img5']['name']!=""){
	    	   $img5=rand(111111111,999999999).'_'.$file['img5']['name'];
				$isupload5=move_uploaded_file($file['img5']['tmp_name'],SERVER_PACKAGE_IMAGE.$img5);

				if($isupload5){
						$this->removePackageImage($id,"img5");
						$image_condition.=", img5='$img5' ";
				}
	    }

	    if($file['img6']['name']!=""){
	    	   $img6=rand(111111111,999999999).'_'.$file['img6']['name'];
				$isupload6=move_uploaded_file($file['img6']['tmp_name'],SERVER_PACKAGE_IMAGE.$img6);

				if($isupload6){
						$this->removePackageImage($id,"img6");
						$image_condition.=", img6='$img6' ";
				}
	    }

		
		$sql="update package set packageName=:packageName,packageDesc=:packageDesc,packagePrice=:$packagePrice,discount=:packageDis,disType=:packageDisType,packageLocation=:packageLocation,packageDuration=:packageDuration $image_condition where id=:id  ";

		
		return $this->db_handle->runUpdateQuery($sql,$data);


	}

	function deletePackage($id){
		$this->removePackageImages($id);
		$sql="delete from package where id='$id' ";
		return $this->db_handle->runDeleteQuery($sql);
	}

	function removePackageImage($id,$img){

		$package=$this->getpackageById($id);
		if($package[$img]!=""){
			unlink(SERVER_PACKAGE_IMAGE.$package[$img]);
		}

	}

	function removePackageImages($id){
		$package=$this->getpackageById($id);
		if($package["img1"]!=" "){
			unlink(SERVER_PACKAGE_IMAGE.$package["img1"]);
		}
		if($package["img2"]!=" "){
			unlink(SERVER_PACKAGE_IMAGE.$package["img2"]);
		}
		if($package["img3"]!=" "){
			unlink(SERVER_PACKAGE_IMAGE.$package["img3"]);
		}
		if($package["img4"]!=" "){
			unlink(SERVER_PACKAGE_IMAGE.$package["img4"]);
		}
		if($package["img5"]!=" "){
			unlink(SERVER_PACKAGE_IMAGE.$package["img5"]);
		}
		if($package["img6"]!=" "){
			unlink(SERVER_PACKAGE_IMAGE.$package["img6"]);
		}
		

	}

	function activePackage($id){
		$sql="update package set status=1 where id='$id'";
		return $this->db_handle->runUpdateQuery($sql);
	}

	function deactivePackage($id){
		$sql="update package set status=0 where id='$id'";
		return $this->db_handle->runUpdateQuery($sql);
	}



}

?>