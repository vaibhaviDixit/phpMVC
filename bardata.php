<?php      

session_start();

require_once("model/offlineBookingModel.php");
$offlineBookingModel=new offlineBookingModel();

$array=$offlineBookingModel->getMonthWiseEarn();
echo json_encode($array);
die();



?>