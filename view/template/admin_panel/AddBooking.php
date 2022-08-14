<main class="content">
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Add Booking</h1>
					</div>
					<hr>
					<span id="popMsg"></span>

					<form method="post" id="bookingForm">

						<div class="row">
							 <div class="col-sm-6 mb-3">
							    	
							    	<label for="pc" class="form-label">Package Name<span class="redStar">*</span></label>
							       		<select class="form-select mb-3" id="pc" name="pc" required onchange="this.form.submit()">
							       			<option selected disabled value="">Select Package</option>
											  <?php
											    if(count($packagesArray)>0){
											      foreach($packagesArray as $pckRow) {

												      	if($pckRow['id']==$packageId){
												      		echo "<option selected value='".$pckRow['id']."'>".$pckRow['packageName']."</option>";
												    	}
												    	else{
												    		echo "<option  value='".$pckRow['id']."'>".$pckRow['packageName']."</option>";
												    	}
													}
												}
											  ?>
								
											  
									</select> 
							       	
							 </div>


							<div class="col-sm-3 mb-3">
				           		   <label for="checkIn" class="form-label">Check In<span class="redStar">*</span></label>
				                    <input type="date" class="form-control"  name="checkIn" id="checkIn" required  min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">
				                
				            </div>
				             <div class="col-sm-3 mb-3">
				                    <label for="checkOut" class="form-label">Check Out<span class="redStar">*</span></label>
				                    <input type="date" class="form-control" name="checkOut" id="checkOut" required  readonly value="<?php echo date("Y-m-d"); ?>">
				             </div> 

							 <div class="col-sm-6 mb-3">
							    	
							    	<label for="name" class="form-label">Customer Name<span class="redStar">*</span></label>

							       	<input type="text" class="form-control" rows="3" id="name" required name="name"  value="<?php echo $membername; ?>">	 
							       	
							 </div>

							 <div class="col-sm-6 mb-3">
							    	<label for="mobile" class="form-label">Customer Mobile<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="mobile" required name="mobile"  value="<?php echo $phone; ?>">
							 </div>

							 <div class="col-sm-12 mb-3">
							    	<label for="address" class="form-label">Customer Address<span class="redStar">*</span></label>
							       <textarea class="form-control" id="address" required name="address">
							       	<?php echo $address; ?>
							       </textarea>
							 </div>

						</div>
			
							
							

				

		

						<div class="row">

							 <div class="col-sm-6 mb-3">
							    	<label for="ptype" class="form-label">Payment Mode<span class="redStar">*</span></label>
							    	<select name="ptype" id="ptype" required class="form-control" >

							    	<option selected disabled value="">Payment Mode</option>
							    	 <?php
							    	 if($payMode=="cash"){
							    	 		echo "<option selected value='cash'>Cash</option>";
							    	 }
							    	 else{
							    	 	echo "<option  value='cash'>Cash</option>";
							    	 }
							    	 if($payMode=="UPI"){
							    	 		echo "<option selected value='UPI'>UPI</option>";
							    	 }
							    	 else{
							    	 	echo "<option  value='UPI'>UPI</option>";
							    	 }
							    	 if($payMode=="OnlineTransfer"){
							    	 		echo "<option selected value='OnlineTransfer'>Online Transfer</option>";
							    	 }
							    	 else{
							    	 	echo "<option  value='OnlineTransfer'>Online Transfer</option>";
							    	 }
							    	 ?>
				           		   	
				           		   </select>
							 </div>
				       
				                <div class="col-sm-3 mb-3">
				                    <label for="adults" class="form-label">Adults<span class="redStar">*</span></label>
				                    <input class="form-control"  type="number" id="adults" name="adults" min="1" required  value="<?php echo $adults; ?>">
				                </div>
				                <div class="col-sm-3 mb-3">
				                   <label for="children" class="form-label">Children<span class="redStar">*</span></label>
				                    <input class="form-control"  type="number" id="children" name="children" min="0" required  value="<?php echo $children; ?>">
				                </div>
				                 <div class="col-sm-3 mb-3">
				                    <input class="form-control" type="number" id="packagePrice" name="packagePrice" required  value="<?php echo $packagePrice; ?>" hidden>
				                </div>

				                <input type="number" name="noOfDays" id="noOfDays" value="<?php echo $noOfDays; ?>" hidden>
				     
										
						</div>

						<div class="row">
							<div class="col-sm-3 mb-3">
				           		   <label for="totalPrice" class="form-label">Total Amount<span class="redStar">*</span></label>
				                    <input type="text" class="form-control"  name="totalPrice" id="totalPrice"  required readonly value="<?php echo $subTotal; ?>">
				                
				            </div>
							<div class="col-sm-3 mb-3">
				           		   <label for="dis" class="form-label">Discount<span class="redStar">*</span></label>
				                    <input type="number" min="0" class="form-control"  name="dis" id="dis" required value="<?php echo $discount; ?>">
				                
				            </div>
				            <div class="col-sm-3 mb-3">
				           		   <label for="distype" class="form-label">Dis Type<span class="redStar">*</span></label>
				           		   <select name="distype" id="distype" class="form-control"  required>
				           		   	<option selected disabled value="">Discount Type</option>
				           		   	<?php
				           		   		if($discount>100){
				           		   			echo "<option value='cash' selected>Cash (&#8377;)</option>";
				           		   		}
				           		   		else{
				           		   			echo "<option value='cash' >Cash (&#8377;)</option>";
				           		   		}
				           		   		if($discount<100){
				           		   			echo "<option value='per' selected>Per (%)</option>";
				           		   		}
				           		   		else{
				           		   			echo "<option value='per'>Per (%)</option>";
				           		   		}

				           		   	?>
				           		   	 
				           		   </select>
				                
				            </div>
				            <div class="col-sm-3 mb-3">
				           		   <label for="grtotal" class="form-label">Grand Total<span class="redStar">*</span></label>
				                    <input type="text" class="form-control" name="grtotal" id="grtotal" required readonly value="<?php echo $total; ?>">
				                
				            </div>


							
						</div>
						<div class="row">

							<div class="col-sm-3 mb-3">
				           		   <label for="payamt" class="form-label">Pay Amount<span class="redStar">*</span></label>
				                    <input type="text" class="form-control" name="payamt" id="payamt" required value="<?php echo $paid; ?>">
				                
				            </div>
				            <div class="col-sm-3 mb-3">
				           		   <label for="remAmt" class="form-label">Remaining Amount<span class="redStar">*</span></label>
				                    <input type="text" class="form-control" name="remAmt" id="remAmt" required readonly value="<?php echo $rem; ?>">
				                
				            </div>

						</div>
						<?php 
							if(isset($_GET['id']))
							{
						?>
						<input type="text" name="bid" id="bid" hidden required readonly value="<?php echo $bookId; ?>">

						<?php		
							}

						 ?>

							 <input type="submit" id="submitBtn" name="addOfflineBooking" class="btn btn-success" value="Submit">

					</form>


				</div>
			</main>

   <script src="<?php echo SITE_PATH; ?>view/static/asset/js/jquery.min.js"></script>
<script type="text/javascript">


function formatDate(d) {
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}

  $(document).on("change",".pertype",function(){
     type=$(this).val();
    
		pkgPrice=parseInt($("#packagePrice").val());

		if(type=="adult"){
          $(this).parent().parent().find(".pamt").val(pkgPrice);
          ad=parseInt($("#adults").val())+1;
          $("#adults").val(ad);
          bookingData();
		}
		if(type=="child"){
			cPr=pkgPrice/2;
			$(this).parent().parent().find(".pamt").val(cPr);
			ch=parseInt($("#children").val())+1;
           $("#children").val(ch);
           bookingData();

		}
   })


	


  $("#distype").on("change",function(){
     calGrandTotal();
     });

     $("#dis").on("change",function(){
     calGrandTotal();
     });


function calGrandTotal(){

	subTotal=parseInt($("#totalPrice").val());
	discount=parseInt($("#dis").val());
	distype=$("#distype").val();
    

    if(discount<=0){
    	$("#grtotal").val(subTotal);
    }
    else{
         grTot=0;
    	if(distype=="cash"){
    	 grTot=subTotal-discount;
    	}
    	if(distype=="per"){
    		d=subTotal*((discount)/100);
    		grTot=subTotal-d;
    	}
    	$("#grtotal").val(grTot);
    }

           total=parseInt($("#grtotal").val());
     		pay=parseInt($("#payamt").val());
     		amt=total-pay;
     		$("#remAmt").val(amt);


}

 $("#payamt").on("change",function payamt(){
            let total=parseInt($("#grtotal").val());
            if(parseInt($(this).val())>total){
            	alert("Invalid amount, it should be less than or equal to  total amount...");
            	$(this).val("0");
            }
            else{
            	pay=parseInt($("#payamt").val());
	     		amt=total-pay;
	     		$("#remAmt").val(amt);
            }
     		
     		
   })
     

   
   $("#checkIn").on("change",function(){
   	  let date=new Date($(this).val()); 
       let outdate = new Date(date);
       outdate.setDate(outdate.getDate() + (parseInt($("#noOfDays").val())));
    
       $("#checkOut").val(formatDate(outdate));
       bookingData();
     });

    
    $("#adults").on("change",function(){
     bookingData();
     })
    $("#children").on("change",function(){
      bookingData();
    })


  


  function bookingData(){
    checkIn=$("#checkIn").val();
    checkOut=$("#checkOut").val();
    adults=$("#adults").val();
    children=$("#children").val();

    var Difference_In_Days =parseInt($("#noOfDays").val());

      chPrice=0;
      packagePrice=$("#packagePrice").val();
      if(children<1){
        adultPrice=parseInt(packagePrice)*parseInt(Difference_In_Days)*parseInt(adults);
        Total=adultPrice;
      }
      else{
        chPrice=parseInt(children)*parseInt(Difference_In_Days)*(parseInt(packagePrice)/2);
        adultPrice=parseInt(packagePrice)*parseInt(Difference_In_Days)*parseInt(adults);
        Total=adultPrice+chPrice;
      }
      console.log("child "+children+" Difference_In_Days"+Difference_In_Days+" adults"+adults+" packagePrice"+packagePrice)
      
      	$("#totalPrice").val(Total);
      	calGrandTotal();
      
  
  }

$("#checkIn").trigger("change");
bookingData();

</script>
