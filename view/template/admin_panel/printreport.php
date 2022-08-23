<?php
	require_once("model/offlineBookingModel.php");

	$offlineBookingModel=new offlineBookingModel();


	if(isset($_GET['month']) and isset($_GET['year']) and isset($_GET['pck'])){

		$month=$_GET['month'];
		$year=$_GET['year'];
		$pck=$_GET['pck'];
        
        $data=$offlineBookingModel->getReport($month,$year,$pck);

        if(count($data[0])<=0){
        	redirect(SITE_PATH."?type=admin&page=report");
        }
	}
	else{
		redirect(SITE_PATH."?type=admin&page=report");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="<?php echo SITE_PATH; ?>view/static/asset/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo SITE_PATH; ?>view/static/asset/css_user/style.css">

	<style type="text/css">
		
		body{
			font-size: 12px;
		}
	</style>

</head>
<body>


	<main class="content">
	<div class="container-fluid p-0">

<table  class="table table-sm table-bordered">
					<thead >
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

						</tr>
					</thead>
					<tbody>

						<?php  


							if(count($data) > 0){
								$i=1;
								for($inx=0; $inx<count($data); $inx++){
									$row=$data[$inx];
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
						<td scope="col"> <?php if(isset($row['payMode'])){ echo $row['payMode'];} ?></td>
						<td scope="col"> <?php  echo $row['adults']; ?></td>
						<td scope="col"> <?php  echo $row['children']; ?></td>
						<td scope="col"> <?php  echo $row['subTotal']; ?></td>
						<td scope="col"> <?php  echo $row['discount']; $disType=$row['disType']; if($disType=='cash'){echo "&#8377;";}if($disType=='per'){echo "%";}  ?></td>
						<td scope="col"> <?php  echo $row['total']; ?></td>
						<td scope="col"> <?php  if(isset($row['paid'])){echo $row['paid'];}else{echo $row['total'];} ?></td>
						<td scope="col"> <?php  if(isset($row['rem'])){echo $row['rem'];}else{echo "0";}  ?></td>
						<td scope="col"> <?php  echo date("d/m/Y", strtotime($row['bookedOn'])); ?></td>
					

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
			</main>
		

	<script type="text/javascript">
		
		window.print();
	</script>


</body>
</html>
