<?php 

if(!isset($_SESSION['ADMIN'])){
   redirect(SITE_PATH.'?page=adminlogin');
}
$id=0;

if(!(isset($_GET['id']) && $_GET['id']>0)){

	redirect(SITE_PATH);
}
else{
	$id=$_GET['id'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo SITE_PATH; ?>view/static/asset/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo SITE_PATH; ?>view/static/asset/css_user/style.css">
	<style type="text/css">
		h1{
			font-size:30px;
		}
		h6{
			font-size:18px;
		}
		th{
			font-size:18px;
		}
		td{
			font-size:18px;
		}
		.heading{
				background-color:#034f84;
				color:white;
			    padding:5px 0;
				border-bottom:1px solid black;
		}
		.brec{
			margin:12px 0;
		}
		.details{
			border-top:1px solid black;
			padding:10px;
			border-bottom:1px solid black;
		}
		.btm{
			background-color:#034f84;
		}
		.btm td{
      		font-size:20px;
			padding:5px 0;
			color:white;
		}


	</style>
</head>
<body>
	<div class="col-12 mb-4" >
		<div class="text-center heading">
			<h1>Imperious Tours</h1>
			<p>Resort Park Avenue Building, Umta Vaddo,Opp McDoanld's Calangute Baga Road, Calangute Goa 4035165</p>
			
		</div>
	
		<h5 class="text-center brec">BILL RECEIPT</h5>
		<div class="details">
		  <table class="table table-sm table-borderless">

<?php
		 $row=$offlineBookingModel->getOfflineBookingDetails($id);

		 if(count($row) > 0){


		 	$CheckIn=date("d/m/Y", strtotime($row['checkIn']));
		 	$CheckOut=date("d/m/Y", strtotime($row['checkOut']));
		 	
		 	$diff=date_diff(date_create($row['checkIn']),date_create($row['checkOut']));
			$days=$diff->format("%a");

			$disType=$row['distype']; 
			if($disType=='cash')
			{
				$sign="&#8377;";
		    }
		    if($disType=='per')
		    {
		    	$sign="%";
			}
		 }
		 ?>

		  	<tbody>
		  	   <tr>
			    
		        	<td>Name: </td><td><?php echo $row['name']; ?></td>
		        	<td>Mobile: </td><td><?php echo  $row['phone']; ?></td>
		        </tr>
		        <tr>
		        	<td>Address: </td><td><?php echo  $row['address']; ?></td>
		        </tr>

		        <tr>
		        	<td>Package: </td><td><?php echo  $row['packageName']; ?></td>
		        	<td>Payment Mode: </td><td><?php echo  $row['payMode']; ?></td>
		        </tr>
		        <tr>
		        	<td>Check In: </td><td><?php echo  $CheckIn; ?></td>
		        	<td>Check Out: </td><td><?php echo  $CheckOut; ?></td>
		       
		        </tr>
		        </tbody>
		    </table>
		    </div>
		

		<table class="table table-sm table-borderless">
			<thead>
				<tr class="table-secondary">
					<th>Persons</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Days</th>
					<th>Amount</th>
				</tr>
			</thead>
	


			<tbody>
				<tr>
					<td>Adult</td>
					<td><?php echo $row['adults']; ?></td>
					<td><?php echo $row['packagePrice']; ?></td>
					<td><?php echo intval($days); ?></td>
					<td><?php echo intval($row['adults'])*intval($row['packagePrice'])*intval($days); ?></td>
				</tr>
				<tr>
					<td>Child</td>
					<td><?php echo $row['children']; ?></td>
					<td><?php echo (intval($row['packagePrice'])/2); ?></td>
					<td><?php echo intval($days); ?></td>
					<td><?php echo intval($row['children'])*(intval($row['packagePrice'])/2)*intval($days); ?></td>
				</tr>
				
				<tr class="btm">
					<td></td><td></td><td></td>
					<td>Subtotal</td>
					<td>&#8377; <?php echo  $row['subTotal']; ?></td>
				</tr>
				<tr class="btm">
					<td></td><td></td><td></td>
					<td>Discount</td>
					<td><?php echo $row['discount'].$sign; ?></td>
				</tr>
				<tr class="btm">
					<td></td><td></td><td></td>
					<td class="table-active">Grand Total</td>
					<td class="table-active">&#8377;<?php echo $row['total']; ?></td>
				</tr>

			</tbody>
		</table>


	</div>


	<script type="text/javascript">
		
		window.print();
	</script>

</body>
</html>


