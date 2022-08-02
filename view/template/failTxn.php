<?php

if(isset($_SESSION['bookId'])){
}
else{
	redirect(SITE_PATH);
}
?>
<section id="bookingProcess"  style="padding-top: 10% !important; height: 100vh;">

	<div class="container pt-3">
		<h3>Something Went Wrong!</h3>
		<h4>Try Again Please!</h4>
	</div>

</section>
<script src="<?php echo SITE_PATH; ?>view/static/asset/js/jquery.min.js"></script>

<script type="text/javascript">
  $(".header").css("background-color", "#223544");
</script>
<?php
	unset($_SESSION['bookingArray']);
?>