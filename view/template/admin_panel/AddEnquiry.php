
<main class="content">
				<div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Add Enquiries</strong></h1>

				
					<form method="post">

					 	<div class="row">
								    <div class="col-sm-6 mb-3">
								     	<label for="name" class="form-label">Name<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="name" required name="name"  value="<?php echo $name; ?>">
								      		
								    </div>
								     <div class="col-sm-6 mb-3">
									<label for="phone" class="form-label">Phone<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="phone" required name="phone"  value="<?php echo $phone; ?>">

							           </div>
						</div>

						<div class="row">
								     <div class="col-sm-12 mb-3">
								     	<label for="query" class="form-label">Query<span class="redStar">*</span></label>
							       		<textarea class="form-control"  id="query" required name="query" ><?php echo $query; ?> </textarea>
								      		
								    </div>

						</div>
						<input type="submit" name="addEnquiry" class="btn btn-success" value="Submit">
					</form>

				


                </div>
			</main>

      <?php

        
      ?>
