<?php 

if(!isset($_SESSION['CURRENT_USER_ID'])){
	redirect(SITE_PATH);
}
if(isset($_GET['submit'])){

	$oid="IMPERIOUS".rand(10000,99999999)."_".$_SESSION['CURRENT_USER_ID'];

	   $checkin=$_GET['checkin'];
	   $checkout=$_GET['checkout'];
       $adults=$_GET['noofadult'];
       $children=$_GET['noofchild'];
       $package=$_GET['package'];
       $subtotal=$_GET['subtotal'];

    $packagesRow=$packagesModel->getpackageById($package);

    $dis=floatval(($packagesRow['discount']));
    $disType=$packagesRow['disType'];
    $payAmt=$_GET['finalAmt'];
    $days=$packagesRow['packageDuration'];

}
else{
	redirect(SITE_PATH);
}



?>
<section id="bookingProcess">
	
	<div class="outer row">
		<div class="innerLeft ">
			<h5 class="checkout_title">Booking Submission</h5>
			
<!-- Address Details starts -->
  
        <form method="post" id="checkOutForm" name="checkOutForm" action="<?php echo SITE_PATH; ?>pgRedirect.php" class="fs-16">

		<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $oid; ?>" hidden>
		<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo rand(1000,9999).'_'.$_SESSION['CURRENT_USER_ID']; ?>" hidden>
		<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" hidden value="Retail">
		<input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" hidden>
		<input title="TXN_AMOUNT" id="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT" hidden
						value="<?php echo $payAmt; ?>">
		<input type="text" name="package" value="<?php echo $package; ?>" hidden>
		<input type="text" name="packagePrice" value="<?php echo $packagesRow['packagePrice']; ?>" hidden>
		<input type="text" name="check_in" value="<?php echo $checkin; ?>" hidden>
		<input type="text" name="check_out" value="<?php echo $checkout; ?>" hidden>
		<input type="text" name="adults" value="<?php echo $adults; ?>" hidden>
		<input type="text" name="children" value="<?php echo $children; ?>" hidden>
		<input type="text" name="total" value="<?php echo $subtotal; ?>" hidden>
		<input type="text" name="dis" value="<?php echo $dis; ?>" hidden>
		<input type="text" name="disType" value="<?php echo $disType; ?>" hidden>
		<input type="text" id="couponSetValue" name="payAmt" value="<?php echo $payAmt; ?>" hidden>

							 <div class="mb-3">
							    	<label for="name" class="form-label">Your Name<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="name" required="required" name="name" value="<?php echo $currentUserDetails['name']; ?>">
							 </div>

							 <div class="mb-3">
							    	<label for="email" class="form-label">Email<span class="redStar">*</span></label>
							       <input type="email" class="form-control" rows="3" id="email" required="required" name="email" value="<?php echo $currentUserDetails['email']; ?>">
							 </div>

							 <div class="mb-3">
							    	<label for="mobile" class="form-label">Phone<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="mobile" name="mobile" required="required" name="mobile" value="<?php echo $currentUserDetails['mobile']; ?>">
							      	
							</div>
							 
	

								<div class="mb-3">
										<label for="adrs" class="form-label">Address<span class="redStar">*</span></label>
										<textarea class="form-control" rows="3"  id="adrs" name="adrs" required="required"><?php echo trim($currentUserDetails['address']); ?></textarea>
									      	
								</div>
						
							<div class="d-flex space-between">
								<div class="col-sm-4 mb-5">
							    	<input type="text" class="form-control form-control-sm" rows="3" id="coupon" name="coupon" placeholder="Coupon Code">
								</div>
								<div class="col-sm-4 mb-5">
							    	<button class="btn btn-sm btn-primary" type="button" onclick="applyCoupon()">Apply Coupon</button>
								</div>
							</div>
							
           					 <button name="payNow" type="submit" id="paymentButton" class="btn  btn-sm btn-primary" >Proceed to Payment</button>
        				


			</form>
      </div>
<!-- Address Details ends -->
		<div class="innerRight">
			<h5 class="checkout_title">Your Booking</h5>
			
			<div class="card bookingInfo" >
				<div class="text-center">
					<div >
						<h6><?php  echo $packagesRow['packageName'];?></h6>
				    </div>

					<div > <img src="<?php  echo SITE_PACKAGE_IMAGE.$packagesRow['img1']; ?>" width="200" height="200" class="resp_img"> </div> 
				</div>
				<hr>
				<div class="tbl">
					<table class=" table-sm fs-16">
						<tr><td>Departure Date </td><td><?php echo date("d/m/Y", strtotime($checkin)); ?></td></tr>
						<tr><td>Check Out Date </td><td><?php echo date("d/m/Y", strtotime($checkout)); ?></td></tr>
						<tr><td>Duration </td><td><?php echo $days; ?> Days</td></tr>
						<tr><td>Adults </td><td><?php echo $adults; ?></td></tr>
						<tr><td>Children </td><td><?php echo $children; ?></td></tr>
					</table>
					

				</div>
				<hr>
				<div class="tbl">
					<table class=" table-sm fs-16">
			
						<tr class="text-success"><td>Total </td><td><?php echo $payAmt; ?></td></tr>

						<tr class="text-success couponMsg"><td>Coupon </td><td><span class="couponCode">-</span></td></tr>

						<tr class="text-success couponMsg"><td>Pay Amount </td><td><span class="finalPrice"><?php echo $payAmt; ?></span></td></tr>
					</table>
					

				</div>

		


			</div>
			
		</div>

	</div>

</section>

<script src="<?php echo SITE_PATH; ?>view/static/asset/js/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

$(".header").css("background-color", "#223544");

	function applyCoupon(){
		coupon=$("#coupon").val();
		if(coupon==""){
			swal("Failed", "Please enter Coupon Code!", "error");
		}
		else{
			jQuery.ajax({
				url:'applyCoupon.php',
				type:'post',
				data:'coupon='+coupon+'&bookPrice='+<?php echo $payAmt; ?>,
				success:function(result){
					console.log(result);
					data=jQuery.parseJSON(result);
					if(data.status=="success"){
						swal("Success",data.msg,"success");
						$(".couponMsg").show();
						$(".couponCode").html(coupon);
						$(".finalPrice").html(data.couponApplied);
						$("#couponSetValue").val(data.couponApplied);
						$("#TXN_AMOUNT").val(data.couponApplied);
						
					}
					if(data.status=="error"){
						swal("Failed",data.msg, "error");
						coupon=$("#coupon").val("");
					}
				}


			})
		}
		
	}

</script>
<script type="text/javascript">
  
  if ( window.history.replaceState ) {
   window.history.replaceState( null, null, window.location.href );
}
</script>