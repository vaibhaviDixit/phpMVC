<?php
require_once("model/database.php");

class couponModel{

	private $db_handle;

	function __construct(){

		$this->db_handle=new Database();
	}

	function getAllCoupons(){
		$sql="select * from coupon where status='1'";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result;
	}

	function addCoupon($params=array()){
		$couponCode=$params['couponCode'];
		$couponType=$params['couponType'];
		$couponValue=$params['couponValue'];
		$minValue=$params['minValue'];
		$expiredOn=$params['expiredOn'];


		if($this->couponExists($couponCode)){
			return 0;
		}
		else{

			$sql="insert into coupon(couponCode,couponType,couponValue,minValue,expiredOn,status) values('$couponCode','$couponType','$couponValue','$minValue','$expiredOn',1) ";
			return $this->db_handle->runInsertQuery($sql);
		}
		return 0;

	}

	function couponExists($couponCode){
		$sql="select * from coupon where couponCode='$couponCode' and status='1' ";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function couponExistsById($id){
		$sql="select * from coupon where id='$id'";
		$result=$this->db_handle->runBasicQuery($sql);
		if(count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function getCouponById($id){
		$sql="select * from coupon where id='$id'";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0];
	}

	function getCouponByCode($coupon){
		$sql="select * from coupon where couponCode='$coupon'";
		$result=$this->db_handle->runBasicQuery($sql);
		return $result[0];
	}


	function updateCoupon($id,$params=array()){
		$couponCode=$params['couponCode'];
		$couponType=$params['couponType'];
		$couponValue=$params['couponValue'];
		$minValue=$params['minValue']; 
		$expiredOn=$params['expiredOn'];


		$sql="update coupon set couponCode='$couponCode',couponType='$couponType',couponValue='$couponValue',minValue='$minValue',expiredOn='$expiredOn' where id='$id' ";
		
		return $this->db_handle->runUpdateQuery($sql);


	}

	function deleteCoupon($id){
		$sql="delete from coupon where id='$id' ";
		return $this->db_handle->runDeleteQuery($sql);
	}

	function activeCoupon($id){
		$sql="update coupon set status='1' where id='$id'";
		return $this->db_handle->runUpdateQuery($sql);
	}

	function deactiveCoupon($id){
		$sql="update coupon set status='0' where id='$id'";
		return $this->db_handle->runUpdateQuery($sql);
	}








}

?>