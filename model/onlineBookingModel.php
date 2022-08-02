<?php
require_once("model/database.php");

class onlineBookingModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getAllOnlineBookings(){
		$sql="select bookonline.*,package.packageName from bookonline,package where bookonline.packageId=package.id and bookonline.paymentStatus='success' order by bookonline.id desc";

		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}


	function getBookingsOfCurrentUser(){
		$uid=$_SESSION['CURRENT_USER_ID'];
		
		$sql="select bookonline.*,package.packageName,package.img1 from bookonline,package where bookonline.packageId=package.id and bookonline.uid='$uid' and bookonline.paymentStatus='success' and bookonline.status=1 ORDER BY bookonline.id DESC ;";

		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

	function getOnlineBookingDetails($id){
		$sql="select bookonline.*,package.packageName from bookonline,package where bookonline.packageId=package.id and bookonline.id='$id'";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0];
	}


	function confirmBooking($id){
		$sql="update bookonline set status=1 where id='$id'";
		
		return $this->db_handle->runUpdateQuery($sql);
	}


	function addOnlineBooking($params=array()){
		$name=$params['name'];
		$phone=$params['mobile'];
		$adrs=$params['adrs'];
		$check_in=$params['check_in'];
		$check_out=$params['check_out'];
		$adults=$params['adults'];
		$children=$params['children'];
		$subTotal=$params['total'];
		$packageId=$params['package'];
		$packagePrice=$params['packagePrice'];
		$dis=$params['dis'];
		$disType=$params['disType'];
		$coupon=$params['coupon'];
		$TXN_AMOUNT = $params["TXN_AMOUNT"];
		$CUST_ID = $params["CUST_ID"];
		$ORDER_ID = $params["ORDER_ID"];
		$uid=explode("_", $CUST_ID)[1];

	    $sql="INSERT INTO `bookonline`(`uid`, `bookId`, `name`, `phone`, `address`, `packageId`, `packagePrice`, `checkIn`, `checkOut`, `adults`, `children`, `subTotal`, `discount`, `disType`, `coupon`, `total`, `paymentStatus`) VALUES ('$uid','$ORDER_ID','$name','$phone','$adrs','$packageId','$packagePrice','$check_in','$check_out','$adults','$children','$subTotal','$dis','$disType','$coupon','$TXN_AMOUNT','pending')";

		return $this->db_handle->runInsertQuery($sql);

	}

	function updateOnlineBooking($params=array()){

		$oid=$params['ORDERID'];
		$payId=$params['TXNID'];
		$uid=explode("_", $oid)[1];

		$sql="update bookonline set `paymentId`='$payId', `paymentStatus`='success' where bookId='$oid' and uid='$uid' ";
		
		return $this->db_handle->runUpdateQuery($sql);


	}

	//get no of online bookings
	function onbookings(){
	    $sql="select * from bookonline";
		return count($this->db_handle->runBasicQuery($sql));
	}

	//get no of pending online bookings
	function pendingBook(){
	    $sql="select * from bookonline where status=0";
		return count($this->db_handle->runBasicQuery($sql));
	}

	//get no of confirmed online bookings
	function confirmBookings(){
		$sql="select * from bookonline where status=1";
		return count($this->db_handle->runBasicQuery($sql));
	}

}

?>