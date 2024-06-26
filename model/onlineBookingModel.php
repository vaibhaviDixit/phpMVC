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

		$uid=0;
		if(isset($_SESSION['CURRENT_USER_ID'])){
			$uid=$_SESSION['CURRENT_USER_ID'];	
		}
		
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

		$data=[
         	'id'=>$id
         ];
		$sql="update bookonline set status=1 where id=:id ";
		
		return $this->db_handle->runUpdateQuery($sql,$data);
	}


	function addOnlineBooking($params=array()){

		$data=[

			'name'=>$params['name'],
			'phone'=>$params['mobile'],
			'email'=>$params['email'],
			'adrs'=>$params['adrs'],
			'check_in'=>$params['check_in'],
			'check_out'=>$params['check_out'],
			'adults'=>$params['adults'],
			'children'=>$params['children'],
			'subTotal'=>$params['total'],
			'packageId'=>$params['package'],
			'packagePrice'=>$params['packagePrice'],
			'dis'=>$params['dis'],
			'disType'=>$params['disType'],
			'coupon'=>$params['coupon'],
			'TXN_AMOUNT'=> $params["TXN_AMOUNT"],
			'ORDER_ID'=>$params["ORDER_ID"],
			'uid'=>explode("_", $params["CUST_ID"])[1]

		];

	    $sql="INSERT INTO `bookonline`(`uid`, `bookId`, `name`, `phone`,`email`, `address`, `packageId`, `packagePrice`, `checkIn`, `checkOut`, `adults`, `children`, `subTotal`, `discount`, `disType`, `coupon`, `total`, `paymentStatus`) VALUES (:uid,:ORDER_ID,:name,:phone,:email,:adrs,:packageId,:packagePrice,:check_in,:check_out,:adults,:children,:subTotal,:dis,:disType,:coupon,:TXN_AMOUNT,'pending')";

		return $this->db_handle->runInsertQuery($sql,$data);

	}

	function updateOnlineBooking($params=array()){

		$data=[

			'oid'=>$params['ORDERID'],
			'payId'=>$params['TXNID'],
			'uid'=>explode("_", $params['ORDERID'])[1]

		];

		$sql="update bookonline set `paymentId`=:payId, `paymentStatus`='success' where bookId=:oid and uid=:uid ";
		
		return $this->db_handle->runUpdateQuery($sql,$data);


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