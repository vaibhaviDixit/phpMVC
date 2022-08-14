<?php
session_start();
// header("Pragma: no-cache");
// header("Cache-Control: no-cache");
// header("Expires: 0");


include ('include/constants.inc.php');
include ('include/functions.inc.php');

$page="";
if(isset($_GET['page']) && !isset($_GET['type'])){
	$page=$_GET['page'];

	if($page=='home'){

		require('service/homeService.php');
		require('view/template/layout/user_header.php');
		require('view/template/index.php');
		require('view/template/layout/user_footer.php');
	}
	elseif($page=='favorite'){

		require('service/homeService.php');
		require('view/template/layout/user_header.php');
		require('view/template/favourites.php');
		require('view/template/layout/user_footer.php');
	}
	elseif($page=='profile'){
		require('service/userService.php');
		require('view/template/user_panel/userHeader.php');
		require('view/template/user_panel/profile.php');
		require('view/template/user_panel/userFooter.php');
	}
	elseif($page=='history'){
		require('service/userService.php');
		require('view/template/user_panel/userHeader.php');
		require('view/template/user_panel/history.php');
		require('view/template/user_panel/userFooter.php');
	}
	elseif($page=='downloadPdf'){
		require('service/onlineBookingService.php');
		require('view/template/user_panel/downloadPdf.php');
	}
	elseif($page=='bookReceipt'){
		require('service/offlineBookingService.php');
		require('view/template/admin_panel/bookReceipt.php');
	}
	elseif($page=='userReceipt'){
		require('service/onlineBookingService.php');
		require('view/template/admin_panel/userReceipt.php');
	}
	elseif($page=='userfav'){
		require('service/userService.php');
		require('view/template/user_panel/userHeader.php');
		require('view/template/user_panel/favourites.php');
		require('view/template/user_panel/userFooter.php');
	}
	elseif($page=='rateus'){
		require('service/userService.php');
		require('view/template/user_panel/userHeader.php');
		require('view/template/user_panel/rateus.php');
		require('view/template/user_panel/userFooter.php');
	}
	elseif($page=='termsandcond'){
		require('service/userService.php');
		require('view/template/user_panel/userHeader.php');
		require('view/template/user_panel/termsandconditions.php');
		require('view/template/user_panel/userFooter.php');
	}
	elseif ($page=='userlogout') {
		require('view/template/user_panel/logout.php');
	}
	elseif($page=='checkout'){

            if(isset($_SESSION['CURRENT_USER_ID'])){
            	
            	require('service/userService.php');
			    require('service/homeService.php');
		        require('view/template/layout/user_header.php');
		        require('view/template/checkout.php');
		        require('view/template/layout/user_footer.php');
            }
            else{      
                 redirect(SITE_PATH."?page=login");         
            }
	}
	elseif ($page=='book') {

		require('service/homeService.php');
        require('view/template/layout/user_header.php');
        require('view/template/bookTour.php');
        require('view/template/layout/user_footer.php');
		          
	}
	elseif($page=='login'){
		require('service/loginService.php');
		require('view/template/login.php');
	}
	elseif($page=='signup'){
		require('view/template/sign-up.php');
	}
	elseif($page=='success'){
		require('service/userService.php');
		require('service/homeService.php');
        require('view/template/layout/user_header.php');
        require('view/template/success.php');
        require('view/template/layout/user_footer.php');
	}
	elseif($page=='failTxn'){
		require('service/userService.php');
		require('service/homeService.php');
        require('view/template/layout/user_header.php');
        require('view/template/failTxn.php');
        require('view/template/layout/user_footer.php');

	}
	elseif($page=='adminlogin'){
		require('view/template/adminlogin.php');
	}


}
// admin controller
elseif(isset($_GET['type']) && $_GET['type']=="admin" && isset($_GET['page']))
{	
	$page=$_GET['page'];

	require('service/adminService.php');
	require('view/template/admin_panel/top.php');

	if($page=='dash'){
		require('view/template/admin_panel/index.php');
	}
	elseif($page=='profile'){
		require('view/template/admin_panel/profile.php');
	}
	elseif($page=='EditViewDetails'){
		require('view/template/admin_panel/EditViewDetails.php');
	}
	elseif($page=='enquiries'){
		require('view/template/admin_panel/enquiries.php');
	}
	elseif($page=='AddEnquiry'){
		require('view/template/admin_panel/AddEnquiry.php');
	}
	elseif($page=='AddElement'){
		require('view/template/admin_panel/AddElement.php');
	}
	elseif($page=='ListElement'){
		require('view/template/admin_panel/ListElement.php');
	}
	elseif($page=='AddBooking'){
		require('view/template/admin_panel/AddBooking.php');
	}
	elseif($page=='ListBooking'){
		require('view/template/admin_panel/ListBooking.php');
	}
	elseif($page=='onlineBookings'){
		require('view/template/admin_panel/onlineBookings.php');
	}
	elseif($page=='paymentDues'){
		require('view/template/admin_panel/paymentDues.php');
	}
	elseif($page=='AddCategory'){
		require('view/template/admin_panel/AddCategory.php');
	}
	elseif($page=='listCategory'){
		require('view/template/admin_panel/listCategory.php');
	}
	elseif($page=='AddCoupon'){
		require('view/template/admin_panel/AddCoupon.php');
	}
	elseif($page=='ListCoupon'){
		require('view/template/admin_panel/ListCoupon.php');
	}
	elseif($page=='listTestimonials'){
		require('view/template/admin_panel/listTestimonials.php');
	}
	elseif($page=='adminHelp'){
		require('view/template/admin_panel/adminHelp.php');
	}
	elseif($page=='logout'){
		require('view/template/admin_panel/logout.php');
	}
	require('view/template/admin_panel/footer.php');

}
else{

		require('service/homeService.php');
		require('view/template/layout/user_header.php');
		require('view/template/index.php');
		require('view/template/layout/user_footer.php');

	}






?>

