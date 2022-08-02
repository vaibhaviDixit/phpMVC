
			<main class="content">
				<div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Add Coupons</strong></h1>

					<form method="post">

					 	<div class="row">
								    <div class="col-sm-6 mb-3">
								     	<label for="couponCode" class="form-label">Coupon Code<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="couponCode" required name="couponCode"  value="<?php echo $couponCode; ?>">
								      		
								    </div>
								     <div class="col-sm-6 mb-3">
								     	<label for="couponType" class="form-label">Coupon Type<span class="redStar">*</span></label>
							       		<select class="form-select mb-3" id="couponType" name="couponType" required  value="<?php echo $couponType; ?>">
							    
											  <?php
											  
												      	if($couponType=="p"){
												      		echo "<option selected value='p'>Percentage (%)</option>";
												    	}
												    	else{
												    		echo "<option  value='p'>Percentage (%)</option>";
												    	}
												    	if($couponType=="r"){
												      		echo "<option selected value='r'>Rupees (&#8377)</option>";
												    	}
												    	else{
												    		echo "<option  value='r'>Rupees (&#8377)</option>";
												    	}
											
											  ?>
								
											  
									</select> 
								      		
								    </div>
						</div>

						<div class="row">
								     <div class="col-sm-4 mb-3">
								     	<label for="couponValue" class="form-label">Coupon Value<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="couponValue" required name="couponValue"  value="<?php echo $couponValue; ?>">
								      		
								    </div>
								     <div class="col-sm-4 mb-3">
								     	<label for="minValue" class="form-label">Booking Min Value<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="minValue" required name="minValue"  value="<?php echo $minValue; ?>">
								      		
								    </div>
								     <div class="col-sm-4 mb-3">
								     	<label for="expiredOn" class="form-label">Coupon Expire Date<span class="redStar">*</span></label>
							       		<input type="date" class="form-control"  id="expiredOn" required name="expiredOn"  value="<?php echo $expiredOn; ?>">
								      		
								    </div>

						</div>
						<input type="submit" name="addCoupon" class="btn btn-success" value="Submit">
					</form>

				


                </div>
			</main>

      <?php

        
      ?>
