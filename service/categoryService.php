<?php 

require_once("model/categoryModel.php");



$categoryModel=new categoryModel();
$categoryArray=$categoryModel->getAllCategories();



if(isset($_GET['id']) && $_GET['id']>0){
	$id=$_GET['id'];

    
    if($categoryModel->categoryExistsById($id)){
    	$categoryRow=$categoryModel->getCategoryById($id);

    	$category=$categoryRow['name'];
		$description=$categoryRow['description'];

    }
	

}

if(isset($_POST['addCategory'])){


	if(!isset($_GET['id'])){
		$result=$categoryModel->addCategory($_POST);
		if($result>0){
			redirect(SITE_PATH."?type=admin&page=listCategory");
		}
		else{
			alertMsg("Category already exists");
		}

	}
	else{
		$result=$categoryModel->updateCategory($id,$_POST);
		if($result==1){
			redirect(SITE_PATH."?type=admin&page=listCategory");
		}
		else{
			alertMsg("failed");
		}

	}

	
}




if(isset($_GET['oper']) && $_GET['oper']=="deletecategory"){
	$result=$categoryModel->deleteCategory($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=listCategory");
	}
	else{
		alertMsg("failed");
	}
}

if(isset($_GET['oper']) && $_GET['oper']=="activecategory"){
	$result=$categoryModel->activeCategory($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=listCategory");
	}
	else{
		alertMsg("failed");
	}
}


if(isset($_GET['oper']) && $_GET['oper']=="deactivecategory"){
	$result=$categoryModel->deactiveCategory($_GET['id']);
	if($result!=0){
		redirect(SITE_PATH."?type=admin&page=listCategory");
	}
	else{
		alertMsg("failed");
	}
}



?>