
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Generate Reports</h1>
					</div>

					<div class="get_report">
               
					<form method="get">
						<div class="row">
							 <div class="col-sm-2 mb-3">
							    	<label for="month" class="form-label">Month<span class="redStar">*</span></label>
							        
							        <select name="month" id="month" required class="form-select" >

							        	<option selected disabled value="">Month</option>

							        	<?php 
							        		foreach ($months as $key => $mon) {
							        	?>
							        	<option value="<?php echo $key; ?>"><?php echo $mon; ?></option>
							        	<?php
							        		}
							        	?>
							        </select>
							 </div>


							  <div class="col-sm-2 mb-3">
							    	<label for="year" class="form-label">Year<span class="redStar">*</span></label>
							        
							        <select name="year" id="year" required class="form-select">
							        	<option selected disabled value="">Year</option>

							        	<?php 
							        		foreach ($years as $yr) {
							        	?>
							        	<option value="<?php echo $yr; ?>"><?php echo $yr; ?></option>
							        	<?php
							        		}
							        	?>
							        </select>
							 </div>

							 <div class="col-sm-2 mb-3">
							    	<label for="year" class="form-label">Package<span class="redStar">*</span></label>
							        
							        <select name="pck" id="pck" required class="form-select" >
							        	<option selected disabled value="">Package</option>
							        	<option value="all">all</option>
							        	<?php 
							        		foreach ($allPackages as $pck) {
							        	?>
							        	<option value="<?php echo $pck['id']; ?>"><?php echo $pck['packageName']; ?></option>
							        	<?php
							        		}
							        	?>

							        </select>
							        <input type="hidden" name="page" value="printreport">
							 </div>
							 <div class="col col-sm-2 mb-3" style="align-self: end;">
							 	<button class="btn btn-primary" type="submit">Get</button>
							 </div>
						</div>
						</form>
						
					</div>


					
				</div>
			</main>

  