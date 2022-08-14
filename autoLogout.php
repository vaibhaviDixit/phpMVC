<?php 
session_start();
require_once('include/constants.inc.php');

if(isset($_POST['type']) && $_POST['type']=="checktime"){

    if(isset($_SESSION['LAST_ACTIVE_TIME'])){
    
      if((time()-$_SESSION['LAST_ACTIVE_TIME'])>ACTIVE_TIME){
        echo json_encode(array("type"=>"logout"));
        die();
      }
      else{
      	echo json_encode(array("type"=>"staylogin"));
        die();
      }

    }
    else{
        echo json_encode(array("type"=>"staylogin"));
        die();
    }

}
else{
        echo json_encode(array("type"=>"staylogin"));
        die();
}
?> 