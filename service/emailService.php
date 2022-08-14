<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

function email($to,$message){

	$from = "tours@imperioustours.com";
	$subject = "Message from ImperiousTours";
	$headers = "From:" . $from;

	if(mail($to,$subject,$message, $headers)) {
	    return true;
	} else {
	    return false;
	}

}


?>