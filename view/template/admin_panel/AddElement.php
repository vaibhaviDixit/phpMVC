
<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Manage Packages</h1>				
					</div>
					<hr>


					<form method="post" enctype="multipart/form-data" id="addPckgForm">
						<div class="row">
							 <div class="col-sm-6 mb-3">
							    	<label for="packageName" class="form-label">Package Name<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="packageName" required name="packageName" value="<?php echo $packageName; ?>">
							 </div>

							 <div class="col-sm-3 mb-3">
							    	<label for="packagePrice" class="form-label">Package Price (per person)<span class="redStar">*</span></label>
							       <input type="number" class="form-control" rows="3" id="packagePrice" required name="packagePrice" value="<?php echo $packagePrice; ?>">

							 </div>

							  <div class="col-sm-3 mb-3">
							    	<label for="packageLocation" class="form-label">Location of Package<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="packageLocation" required name="packageLocation" value="<?php echo $packageLocation; ?>">

							 </div>

							  <div class="col-sm-3 mb-3">
							    	<label for="packageDuration" class="form-label">Package Duration (No of days)<span class="redStar">*</span></label>
							       <input type="number" class="form-control" rows="3" id="packageDuration" required name="packageDuration" value="<?php echo $packageDuration; ?>">

							 </div>

							 <div class="col-sm-3 mb-3">
									<label for="packageDis" class="form-label">Discount<span class="redStar">*</span></label>
							       <input type="number" class="form-control" rows="3" id="packageDis" required name="packageDis" value="<?php echo $packageDis; ?>" min=0>
								</div>
								<div class="col-sm-3 mb-3">
									<label for="packageDisType" class="form-label">Discount Type<span class="redStar">*</span></label>
							       <select class="form-select mb-3" id="packageDisType" name="packageDisType" required>
											  <?php
											  	

												      	if($packageDisType=="per"){
												      		echo "<option selected value='per'>Per(%)</option>";
												    	}
												    	else{
												    		echo "<option value='per'>Per(%)</option>";
												    	}
												    	if($packageDisType=="cash"){
												      		echo "<option selected value='cash'>Cash(&#8377;)</option>";
												    	}
												    	else{
												    		echo "<option value='cash'>Cash(&#8377;)</option>";
												    	}
												
											  ?>
								
											  
											</select> 

								</div>

						</div>

						<div class="row">
							 <div class="col mb-3">
							    	<label for="packageDesc" class="form-label">Package Description<span class="redStar">*</span></label>
							       <textarea class="form-control" rows="3" id="placedesc" name="packageDesc" required><?php echo $packageDesc; ?></textarea>
							 </div>
						</div>


						<div class="row packageimages">
							<b class="form-label">Package Images<span class="redStar">*</span></b>

							 <div class="col-sm-2 mb-3">
							    	<label for="img_1" class="form-label" id="preview_img_1">
							    		<img src="view/static/asset/images/blankimg.png" class="icon">
							    	</label>
							    	<input type="file" class="form-control" id="img_1" <?php echo $image_status; ?> name="img1" accept="image/*">
							 </div>

							 <div class="col-sm-2 mb-3">
							    	<label for="img_2" class="form-label" id="preview_img_2">
							    		<img src="view/static/asset/images/blankimg.png" class="icon">
							    	</label>
							    	<input type="file" class="form-control" id="img_2" <?php echo $image_status; ?> name="img2" accept="image/*">
							 </div>

							 <div class="col-sm-2 mb-3">
							    	<label for="img_3" class="form-label" id="preview_img_3">
							    		<img src="view/static/asset/images/blankimg.png" class="icon">
							    	</label>
							    	<input type="file" class="form-control" id="img_3" <?php echo $image_status; ?> name="img3" accept="image/*">
							 </div>

							 <div class="col-sm-2 mb-3">
							    	<label for="img_4" class="form-label" id="preview_img_4">
							    		<img src="view/static/asset/images/blankimg.png" class="icon">
							    	</label>
							    	<input type="file" class="form-control" id="img_4" <?php echo $image_status; ?> name="img4" accept="image/*">
							 </div>


							 <div class="col-sm-2 mb-3">
							    	<label for="img_5" class="form-label" id="preview_img_5">
							    		<img src="view/static/asset/images/blankimg.png" class="icon">
							    	</label>
							    	<input type="file" class="form-control" id="img_5" <?php echo $image_status; ?> name="img5" accept="image/*">
							 </div>

							 <div class="col-sm-2 mb-3">
							    	<label for="img_6" class="form-label" id="preview_img_6">
							    		<img src="view/static/asset/images/blankimg.png" class="icon">
							    	</label>
							    	<input type="file" class="form-control" id="img_6" <?php echo $image_status; ?> name="img6" accept="image/*">
							 </div>

						</div>

						
							 <input type="submit" name="addPackage" class="btn btn-success" value="Submit">

					</form>


				</div>
			</main>

<?php


?>
