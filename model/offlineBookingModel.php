<?php
require_once("model/database.php");

class offlineBookingModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getAllOfflineBookings(){
		$sql="select booking.*,package.packageName from booking,package where booking.packageId=package.id order by booking.id desc";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

	function getPaymentDues(){
		$sql="SELECT count(rem) FROM `booking` WHERE rem>0";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0]['count(rem)'];
	}

	function getAllPaymentDues(){
		$sql="select booking.*,package.packageName from booking,package where booking.packageId=package.id and booking.rem>0";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}


	function addOfflineBooking($params=array()){


		$data = [
		    'name' => $params['name'],
		    'phone' => $params['phone'],
		    'address' => $params['address'],
		    'packageId' => $params['packageId'],
		    'checkIn' => $params['checkIn'],
		    'checkOut' => $params['checkOut'],
		    'payMode' => $params['payMode'],
		    'adults' => $params['adults'],
		    'children' => $params['children'],
		    'packagePrice' => $params['packagePrice'],
		    'subTotal' => $params['subTotal'],
		    'discount' => $params['discount'],
		    'total' => $params['total'],
		    'paid' => $params['paid'], 
		    'rem' => $params['rem']
		];


	    $sql="INSERT INTO `booking`(`name`, `phone`,`address`,`packageId`, `packagePrice`, `checkIn`, `checkOut`, `payMode`, `adults`, `children`, `subTotal`, `discount`,`distype`, `total`, `paid`, `rem`) VALUES (:name,:phone,:address,:packageId,:packagePrice,:checkIn,:checkOut,:payMode,:adults,:children,:subTotal,:discount,:disType,:total,:paid,:rem')";

		return $this->db_handle->runInsertQuery($sql,$data);

	}


	function bookingExistsById($id){
		$sql="select * from booking where id='$id'";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function getBookingById($id){
		$sql="select * from booking where id='$id'";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0];
	}

	function getOfflineBookingDetails($id){
		$sql="select booking.*,package.packageName from booking,package where booking.packageId=package.id and booking.id='$id' ";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0];
	}

	function updateOfflineBooking($id,$params=array()){
		$data = [
		    'name' => $params['name'],
		    'phone' => $params['phone'],
		    'address' => $params['address'],
		    'packageId' => $params['packageId'],
		    'checkIn' => $params['checkIn'],
		    'checkOut' => $params['checkOut'],
		    'payMode' => $params['payMode'],
		    'adults' => $params['adults'],
		    'children' => $params['children'],
		    'packagePrice' => $params['packagePrice'],
		    'subTotal' => $params['subTotal'],
		    'discount' => $params['discount'],
		    'total' => $params['total'],
		    'paid' => $params['paid'], 
		    'rem' => $params['rem'],
		    'id' => $id
		];



		$sql="update `booking` set `name`=:name, `phone`=:phone, `packageId`=:packageId, `packagePrice`=:packagePrice, `checkIn`=:checkIn, `checkOut`=:checkOut, `payMode`=:payMode, `adults`=:adults, `children`=:children, `subTotal`=:subTotal, `discount`=:discount, `total`=:total, `paid`=:paid, `rem`=:rem' where `id`=:id' ";
		
		return $this->db_handle->runUpdateQuery($sql,$data);


	}

	// get month wise earning
	function getMonthWiseEarn(){

		$dt=date("Y");

		$sql1="SELECT sum(paid) as total,MONTH(bookedOn) as month from `booking` where YEAR(bookedOn)='$dt' group by MONTH(bookedOn)";

		$sql2="SELECT sum(total) as total,MONTH(bookedOn) as month from `bookonline` where paymentStatus='success' and YEAR(bookedOn)='$dt' and status=1 group by MONTH(bookedOn)";
        

		$earn1=$this->db_handle->runBasicQuery($sql1);
		$earn2=$this->db_handle->runBasicQuery($sql2);

		$months=array();
		$priceArray=array();
		$getName=array("1"=>"Jan", "2"=>"Feb", "3"=>"March","4"=>"April","5"=>"May","6"=>"June","7"=>"July","8"=>"August","9"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");

		if(count($earn1)>0){
			foreach ($earn1 as $row1){

				array_push($months, $getName[$row1['month']]);
				array_push($priceArray, $row1['total']);
			}
		}

		if(count($earn2)>0){

			foreach($earn2 as $row2){

				array_push($months, $getName[$row2['month']]);
				array_push($priceArray, $row2['total']);	

				foreach ($months as $key => $value) {
					if($getName[$row2['month']]==$value){
							$priceArray[$key]=$row2['total']+$priceArray[$key];
					}
				}	
			}
		}

		$finalArray=array();
		$finalArray['data1']=$months;	
		$finalArray['data2']=$priceArray;	
		return $finalArray;
	}


	//get no of offline bookings
	function offbookings(){
	    $sql="select * from booking";
		return count($this->db_handle->runBasicQuery($sql));
	}

	
	//get no of *todays* offline+offline bookings
	function todaybookings(){
	    $tdate=date('Y-m-d');
	   $sql1="select * from booking where bookedOn='$tdate'";
	   $offline=$this->db_handle->runBasicQuery($sql1);

	    $sql2="select * from bookonline where bookedOn='$tdate' and paymentStatus='success' ";
	   $online=$this->db_handle->runBasicQuery($sql2);

		return count($offline)+count($online);
	}

}


?>