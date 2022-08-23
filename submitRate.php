<?php      

session_start();

require_once("model/testimonialModel.php");
require_once("model/packagesModel.php");

$testimonialModel=new testimonialModel();
$packagesModel=new packagesModel();


if(isset($_POST['type'])){


$type=$_POST['type'];

if($type=='testimonial'){


	if(isset($_POST['stars']) && isset($_POST['msg'])){

		if($testimonialModel->addReview($_POST) > 0){
			$arr=array("status"=>"success");
			echo json_encode($arr);
			die();
		}else{
			$arr=array("status"=>"error");
			echo json_encode($arr);
			die();
		}

	}

}


// package ratings

if($type=='packageReview'){


	if(isset($_POST['stars']) && isset($_POST['pckid'])){

		if($packagesModel->addPackageReview($_POST) > 0){
			$arr=array("status"=>"success");
			echo json_encode($arr);
			die();
		}else{
			$arr=array("status"=>"error");
			echo json_encode($arr);
			die();
		}

	}

}





}

?>