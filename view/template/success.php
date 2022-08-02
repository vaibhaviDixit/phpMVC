<?php

require_once("service/emailService.php");

if(isset($_SESSION['bookId'])){

 $id=$_SESSION['bookId'];
 $uid=$_SESSION['CURRENT_USER_ID'];

}
else{
	redirect(SITE_PATH);
}
?>

<section id="bookingProcess"  style="padding-top: 40vh !important; height: 100vh;">

	<div class="container pt-3">
		<h3>Thank You!</h3>
		<h4>Your booking is successful!</h4>
		<small>After booking confirmation your booking history will be updated!</small>
		<small>You will get confirmation acknowledgement shortly!</small>
	</div>
	


</section>

<script src="<?php echo SITE_PATH; ?>view/static/asset/js/jquery.min.js"></script>

<script type="text/javascript">
  $(".header").css("background-color", "#223544");
</script>

<?php

unset($_SESSION['bookingArray']);
unset($_SESSION['bookId']);

// send email acknowledgement to admin about new booking...
$text="You have new booking.<br>Check your admin panel now...";
email($adminSocial['email'],$text);

?>