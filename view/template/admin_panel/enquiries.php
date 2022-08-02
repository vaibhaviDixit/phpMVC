 <main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Enquiries</h1>
					</div>
					<hr>
				<div class="container table-responsive">

					<table id="dttable" class="table table-striped   table-hover  table-sm pt-3">
					<thead class="table-primary">
						<tr>
						<th scope="col" width="2%">Sr. No</th>
						<th scope="col">Name</th>
						<th scope="col">Phone</th>
						<th scope="col">Enquiry</th>
						<th scope="col">Date</th>
						<th scope="col" width="28%">Actions</th>

						</tr>
					</thead>
					<tbody>

						<?php  

							if(count($enquiryArray) > 0){
								$i=1;
								foreach($enquiryArray as $row){

						?>

						<tr>
						<td scope="col"> <?php  echo $i; ?></td>
						<td scope="col"> <?php  if(isset($row['name'])){echo $row['name'];} ?></td>
						<td scope="col"> <?php  echo $row['phone']; ?></td>
						<td scope="col"> <?php  echo $row['query']; ?></td>
						<td scope="col"> <?php  echo date("d/m/Y h:i:s A",strtotime($row['date'])); ?></td>
						<td scope="col">

							<a href="?type=admin&page=AddEnquiry&id=<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>


							<a href="?type=admin&page=enquiries&id=<?php echo $row['id']; ?>&oper=deletenquiry"> <button class="btn btn-danger btn-sm">Delete</button> </a>


						</td>

						</tr>


						<?php
								$i++;

								}
							}
							else{
							?>
							<td colspan="6">Data not found</td>

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


if( isset($_GET['type']) && $_GET['type']!==' '  &&  isset($_GET['id']) && $_GET['id'] > 0  )
{

	$type=$_GET['type'];
	$id=$_GET['id'];

	if( $type == 'delete')
	{
		 mysqli_query($con,"delete from query where id='$id' ");
		 redirect(SITE_PATH.'templates/admin_panel/enquiries');

	}

	}

?>