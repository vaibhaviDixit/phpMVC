
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Testimonials</h1>
					</div>
					<hr>
				<div class="container table-responsive">

					<table id="dttable" class="table table-striped   table-hover  table-sm pt-3">
					<thead class="table-primary">
						<tr>
						<th scope="col" width="2%">Sr. No</th>
						<th scope="col">Name</th>
						<th scope="col" width="2%">Stars</th>
						<th scope="col">Description</th>
						<th scope="col" width="28%">Actions</th>

						</tr>
					</thead>
					<tbody>

						<?php  

							if(count($testimonialsArray)>0){
								$i=1;
								foreach($testimonialsArray as $row){
						?>
						<tr>
						<td scope="col"> <?php  echo $i; ?></td>
						<td scope="col"> <?php  echo $row['name']; ?></td>
						<td scope="col"> <?php  echo $row['stars']; ?></td>
						<td scope="col"> <?php  echo $row['description']; ?></td>
						<td scope="col">
							
							<a href="?type=admin&page=listTestimonials&id=<?php echo $row['rid']; ?>&oper=deletetesti"> 
								<button class="btn btn-danger btn-sm">Delete</button> </a>

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
