			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Travel Packages</h1>
					</div>
					<hr>

				<div class="container table-responsive">

					<table class="table table-striped   table-hover  table-sm pt-3" id="dttable">
					<thead class="table-primary">
						<tr>

						<th scope="col">Sr No.</th>
						<th scope="col">Name</th>
						<th scope="col">Location</th>
						<th scope="col">Description</th>
						<th scope="col">Price</th>
						<th scope="col">Discount</th>
						<th scope="col">Duration</th>
						<th scope="col" width="20%">Actions</th>

						</tr>
					</thead>
					<tbody>
					<?php  

							if(count($allPackages) > 0){
								$i=1;
								foreach($allPackages as $row){
						?>

							
						<div class="card packageDescription" id="packageDescription_<?php echo $row['id']; ?>"  style=" position: absolute !important;  display: none; z-index: 1000; width: 70%; height: 85vh; overflow: scroll; left: 20%; top: 10%;">
							    <a href="#" class="closeDrop" style="font-size: 2rem; position: absolute; right:3%;text-decoration: none;">&times;</a>
								<b class="card-header"><?php  echo $row['packageName']; ?><br>
									<?php  echo $row['packageLocation']; ?>
								</b>
                    			<div class="card-body"><?php  echo html_entity_decode($row['packageDesc']); ?></div>
                  		</div>
						
						<tr>
						<td scope="col"> <?php  echo $i; ?></td>
						<td scope="col" > <?php  echo $row['packageName']; ?></td>
						<td scope="col" > <?php  echo $row['packageLocation']; ?></td>
						<td scope="col" > 
							<a href="#" style="text-decoration: none;" class="descriptionDropDown" data-id="<?php echo $row['id']; ?>">See Description</a>

						</td>
						<td scope="col" > <?php  echo $row['packagePrice']; ?></td>
						<td scope="col" > <?php  echo $row['discount']; if($row['disType']=='cash'){
							echo "&#8377;";}if($row['disType']=='per'){echo "%";} ?></td>
						<td scope="col" > <?php  echo $row['packageDuration']; ?> Days</td>
						<td scope="col" >

							<a href="?type=admin&page=AddElement&id=<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>
							


							<?php
								if( $row['status'] == 1 ){
							?>
							<a href="?type=admin&page=ListElement&id=<?php echo $row['id']; ?>&oper=deactivepackage"> <button class="btn btn-primary btn-sm">Active</button> </a>

							<?php

								}
								else
								{
							?>
							<a href="?type=admin&page=ListElement&id=<?php echo $row['id']; ?>&oper=activepackage"> <button class="btn btn-secondary btn-sm">Deactive</button> </a>

							<?php
								}

							?>

							<a href="?type=admin&page=ListElement&id=<?php echo $row['id']; ?>&oper=deletepackage"> <button class="btn btn-danger btn-sm">Delete</button> </a>


						</td>
						</tr>

						

						<?php
								$i++;

								}
							}
							else{
							?>
							<td colspan="4">Data not found</td>

							<?php

							}

						?>
					</tbody>

					</table>


				</div>
					
				</div>
			</main>
