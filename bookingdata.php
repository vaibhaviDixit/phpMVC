<?php      

session_start();

require_once("model/offlineBookingModel.php");
require_once("model/onlineBookingModel.php");
$offlineBookingModel=new offlineBookingModel();
$onlineBookingModel=new onlineBookingModel();


$onbookings=$onlineBookingModel->onbookings();
$offbookings=$offlineBookingModel->offbookings();
$pendingBook=$onlineBookingModel->pendingBook();
$todaybookings=$offlineBookingModel->todaybookings();
$cnfBook=$onlineBookingModel->confirmBookings();

$data = array($todaybookings,$onbookings,$offbookings,$pendingBook,$cnfBook);

echo json_encode($data);
die();

?>