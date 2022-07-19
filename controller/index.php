<?php 
require_once("model/homeModel.php");

$page='home';
if(isset($_GET['page'])){
	$page=$_GET['page'];
}

if($page=='home'){
	$homeModel=new homeModel();
	$testimonials=$homeModel->getAllTestimonials();
	print_r($testimonials);
	require('view/template/layout/user_header.php');
	require('view/template/index.php');
	require('view/template/layout/user_footer.php');
}
elseif($page=='favorite'){
	require('view/template/layout/user_header.php');
	require('view/template/favourites.php');
	require('view/template/layout/user_footer.php');
}
elseif($page=='profile'){
	require('view/template/user_panel/userHeader.php');
	require('view/template/user_panel/profile.php');
	require('view/template/user_panel/userFooter.php');
}
elseif($page=='history'){
	require('view/template/user_panel/userHeader.php');
	require('view/template/user_panel/history.php');
	require('view/template/user_panel/userFooter.php');
}
elseif($page=='userfav'){
	require('view/template/user_panel/userHeader.php');
	require('view/template/user_panel/favourites.php');
	require('view/template/user_panel/userFooter.php');
}
elseif($page=='rateus'){
	require('view/template/user_panel/userHeader.php');
	require('view/template/user_panel/rateus.php');
	require('view/template/user_panel/userFooter.php');
}
elseif($page=='termsandcond'){
	require('view/template/user_panel/userHeader.php');
	require('view/template/user_panel/termsandconditions.php');
	require('view/template/user_panel/userFooter.php');
}
elseif ($page=='userlogout') {
	require('view/template/user_panel/logout.php');
}
elseif($page=='login'){
	require('view/template/login.php');
}
elseif($page=='adminlogin'){
	require('view/template/adminlogin.php');
}
elseif($page=='signup'){
	require('view/template/sign-up.php');
}
else{

}

?>

