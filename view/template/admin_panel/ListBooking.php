<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Offline Bookings</h1>
					</div>
					<hr>
				<div class="container table-responsive">

					<table id="dttable" class="table table-striped   table-hover  table-sm pt-3">
					<thead class="table-primary">
						<tr>
						<th scope="col">Sr. No</th>
						<th scope="col">Name</th>
						<th scope="col">Phone</th>
						<th scope="col">Address</th>
						<th scope="col">Package</th>
						<th scope="col">Price</th>
						<th scope="col">CheckIn</th>
						<th scope="col">CheckOut</th>
						<th scope="col">PayMode</th>
						<th scope="col" width="10%">Adults</th>
						<th scope="col" width="10%">Children</th>
						<th scope="col">subTotal</th>
						<th scope="col">Dis</th>
						<th scope="col">GrandTotal</th>
						<th scope="col">Paid</th>
						<th scope="col">Remain</th>
						<th scope="col">Booked On</th>
						<th scope="col">Actions</th>

						</tr>
					</thead>
					<tbody>

						<?php  


							if(count($offlineBookingArray) > 0){
								$i=1;
								foreach($offlineBookingArray as $row){

						?>

						<tr>
						<td scope="col"> <?php  echo $i; ?></td>
						<td scope="col"> <?php  echo $row['name']; ?></td>
						<td scope="col"> <?php  echo $row['phone']; ?></td>
						<td scope="col"> <?php  echo $row['address']; ?></td>
						<td scope="col"> <?php  echo $row['packageName']; ?></td>
						<td scope="col"> <?php  echo $row['packagePrice']; ?></td>
						<td scope="col"><?php echo date("d/m/Y", strtotime($row['checkIn']));?></td>
						<td scope="col"> <?php echo date("d/m/Y", strtotime($row['checkOut']));?></td>
						<td scope="col"> <?php  echo $row['payMode']; ?></td>
						<td scope="col"> <?php  echo $row['adults']; ?></td>
						<td scope="col"> <?php  echo $row['children']; ?></td>
						<td scope="col"> <?php  echo $row['subTotal']; ?></td>
						<td scope="col"> <?php  echo $row['discount']; $disType=$row['distype']; if($disType=='cash'){echo "&#8377;";}if($disType=='per'){echo "%";}  ?></td>
						<td scope="col"> <?php  echo $row['total']; ?></td>
						<td scope="col"> <?php  echo $row['paid']; ?></td>
						<td scope="col"> <?php  echo $row['rem']; ?></td>
						<td scope="col"> <?php  echo date("d/m/Y", strtotime($row['bookedOn'])); ?></td>
						<td scope="col">

							<a href="?type=admin&page=AddBooking&id=<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>
							
							<a target="_blank" href="?page=bookReceipt&id=<?php echo $row['id']; ?>"> <button class="btn btn-danger btn-sm">View</button> </a>


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

      <?php

        
      ?>

   
<?php




?>