<?php
   
      if(!isset($_SESSION['ADMIN'])){
         redirect(SITE_PATH.'?page=adminlogin');
      }
      if(isset($_SESSION['LAST_ACTIVE_TIME'])){

          $_SESSION['LAST_ACTIVE_TIME']=time();

      }
      
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">


      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITE_PATH; ?>view/static/asset/logo/
      apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITE_PATH; ?>view/static/asset/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITE_PATH; ?>view/static/asset/logo/favicon-16x16.png">
    <link rel="manifest" href="<?php echo SITE_PATH; ?>view/static/asset/logo/site.webmanifest">
    <link rel="mask-icon" href="<?php echo SITE_PATH; ?>view/static/asset/logo/safari-pinned-tab.svg" color="#5bbad5">
   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="theme-color" content="#ffffff">
      <meta name="author" content="AdminKit">
      <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
      <!-- cdn for data table -->



<!-- custom css -->
   <link href="<?php echo SITE_PATH; ?>view/static/asset/css_admin/custom.css" rel="stylesheet">
   <!-- bootstrap css -->
   <link href="<?php echo SITE_PATH; ?>view/static/asset/bootstrap.min.css" rel="stylesheet">
    <!-- panel css -->
     <link rel="stylesheet" href="<?php echo SITE_PATH; ?>view/static/asset/css/light.css">
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>view/static/asset/css/all.css">

       <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
      <title>Admin Panel</title>


   <style type="text/css">
      .linkActive{
         background-color: darkgoldenrod;
         color: white;
      }

   </style>
   
   </head>
   <body data-theme="light" data-layout="fluid" data-sidebar-position="right" data-sidebar-layout="default">
      <div class="wrapper">
         <!-- SIDEBAR START -->
<nav id="sidebar" class="sidebar js-sidebar collapsed">
   <div class="sidebar-content js-simplebar">

      <ul class="sidebar-nav">
      <li class="sidebar-header shadow-sm text-black" >
                  <b>DashBoard</b>
            </li>
           <li class="sidebar-item active">
                  <a class="sidebar-link" href="?type=admin&page=dash">
                           <i class="align-middle" data-feather="sliders"></i> <span>DashBoard</span>
                       </a>
                
            </li>


            <li class="sidebar-item active">
                  <a class="sidebar-link" href="?type=admin&page=profile">
                           <i class="align-middle" data-feather="user"></i> <span>Profile</span>
                       </a>
                
            </li>


            <li class="sidebar-item active">
                  <a class="sidebar-link" href="?type=admin&page=listTestimonials">
                           <i class="align-middle" data-feather="edit-3"></i> <span>Testimonials</span>
                       </a>
                
            </li>
               

             <!-- <hr style="border:1px groove #3b7ddd;">  -->

             <li class="sidebar-header shadow-sm text-black" >
                  <b>Enquiries</b>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=enquiries">
                 <i class="align-middle" data-feather="message-circle"></i> <span class="align-middle">Enquiries</span>
                        </a>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=AddEnquiry">
                  <i class="align-middle" data-feather="message-circle"></i> <span class="align-middle">Add Enquiry</span>
                        </a>
            </li>
            
            
      

             <li class="sidebar-header shadow-sm text-black" >
                  <b>Packages</b>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=AddElement">
                  <i class="align-middle" data-feather="plus-square"> </i><span class="align-middle">Add Package</span>
                        </a>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=ListElement">
                  <i class="align-middle" data-feather="list"></i> <span class="align-middle">Package List</span>
                        </a>
            </li>
           

            <li class="sidebar-header shadow-sm text-black" >
                  <b>Bookings</b>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=AddBooking">
                  <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Add Bookings</span>
                        </a>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=ListBooking">
                  <i class="align-middle" data-feather="list"></i> <span class="align-middle">Offline Bookings</span>
                        </a>
            </li>
            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=onlineBookings">
                  <i class="align-middle" data-feather="list"></i> <span class="align-middle">Online Bookings</span>
                        </a>
            </li>
            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=paymentDues">
                 <i class="align-middle" data-feather="list"></i> <span class="align-middle">Payment Dues</span>
                        </a>
            </li>


            <li class="sidebar-header shadow-sm text-black" >
                  <b>Coupon</b>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=AddCoupon">
                  <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Add Coupon</span>
                        </a>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=ListCoupon">
                  <i class="align-middle" data-feather="list"></i> <span class="align-middle">List Coupon</span>
                        </a>
            </li>
               

 <li class="sidebar-header shadow-sm text-black" >
                  <b>Reports</b>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=report">
                  <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Get Report</span>
                        </a>
            </li>

          


            <li class="sidebar-header shadow-sm text-black" >
                  <b>LogOut</b>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link" href="?type=admin&page=logout">
                  <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">LogOut</span>
                        </a>
            </li>


      </ul>
      
   </div>
</nav>

      <!-- SIDEBAR END -->
      <!-- admin navbar starts -->
      <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg" style="justify-content: space-between !important;">

         <a class="sidebar-toggle js-sidebar-toggle">
         <i class="hamburger align-self-center"></i>
         </a>
         <div style=" position: absolute !important; right: 3rem;">
            <ul class="navbar-nav navbar-align">
               <li class="nav-item">
                  <a class="nav-link  userdropdown d-sm-inline-block " href="javascript:void(0)"  >
                  <img src="<?php  echo SITE_PROFILE_IMAGE.$row['profile']; ?>" class="avatar img-fluid rounded me-1" alt="Admin" /> 
                  <span class="text-dark"><?php echo $row['name']; ?></span>
                  <span> <i class="align-middle" data-feather="chevron-down"></i> </span>
                  </a>
                  <div class="card"  id="userDrop" style=" position: absolute !important; top: 2rem; display: none; z-index: 1000;">
                     <ul class="list-group list-group-flush">

                        <li class="list-group-item"><a target="_blank" class="dropdown-item" href="?type=admin&page=adminHelp">Help</a></li>

                        <li class="list-group-item"><a class="dropdown-item" href="?type=admin&page=logout">Log out</a></li>
                     </ul>
                  </div>
               </li>
            </ul>


         </div>

           <a href="<?php echo SITE_PATH; ?>" style="font-weight: bolder; color: #000;"><?php echo SITE_NAME; ?></a>
      </nav>
         <!-- NAVBAR END -->

   