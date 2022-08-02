<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
include ("include/constants.inc.php");
include ("include/functions.inc.php");
require_once("view/template/lib/config_paytm.php");
require_once("view/template/lib/encdec_paytm.php");

require_once("model/onlineBookingModel.php");
$onlineBookingModel=new onlineBookingModel();


$paytmChecksum = "";
$paramList = array();
$paramList=$_POST;
$isValidChecksum = "FALSE";
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; 

//Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.

$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<b>Transaction status is success</b>" . "<br/>";

		$oid=$_POST['ORDERID'];
		$uid=explode("_", $oid)[1];

		if($onlineBookingModel->updateOnlineBooking($_POST)>0)
		{
			if(!isset($_SESSION['CURRENT_USER_ID'])){
				$_SESSION['CURRENT_USER_ID']=$uid;
			}

			$_SESSION['bookId']=$oid;
			redirect(SITE_PATH."?page=success");
		}

	}
	else {
		redirect(SITE_PATH."?page=failTxn");
	}


}
else {
	redirect(SITE_PATH."?page=failTxn");
	//Process transaction as suspicious.
}

?>