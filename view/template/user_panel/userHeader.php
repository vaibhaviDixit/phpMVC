<?php
   session_start();
   

include ('view/template/layout/include/functions.inc.php');
include ('view/template/layout/include/constants.inc.php');
   
   
   
   $favArray=getFavourites();
   $row=getCurrentUserDetails();
   
   if(!isset($_SESSION['CURRENT_USER_ID'])){
   	redirect(SITE_PATH.'templates/login');
   }
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
      <meta name="author" content="AdminKit">
      <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITE_PATH; ?>view/static/asset/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITE_PATH; ?>view/static/asset/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITE_PATH; ?>view/static/asset/logo/favicon-16x16.png">
    <link rel="manifest" href="<?php echo SITE_PATH; ?>view/static/asset/logo/site.webmanifest">
    <link rel="mask-icon" href="<?php echo SITE_PATH; ?>view/static/asset/logo/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>view/static/asset/css_user/style.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Galada' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <script src="<?php echo SITE_PATH; ?>view/static/asset/js_user/script.js"></script>
      <link rel="canonical" href="https://demo-basic.adminkit.io/" />
      <title>User Panel</title>
      <link href="<?php echo SITE_PATH; ?>view/static/asset/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo SITE_PATH; ?>view/static/asset/css_admin/app.css" rel="stylesheet">
      <link href="<?php echo SITE_PATH; ?>view/static/asset/css_user/cards.css" rel="stylesheet">
      <link href="<?php echo SITE_PATH; ?>view/static/asset/css_user/rateus.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="wrapper">
      <nav id="sidebar" class="sidebar js-sidebar">
         <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="?page=home">
            <span class="align-middle"><i class="fas fa-home"></i> Home</span>
            </a>
            <ul class="sidebar-nav">
            <li class="sidebar-item ">
               <a class="sidebar-link" href="?page=profile">
                  
                  <span class="align-middle"><i class="fas fa-user-alt"></i> Profile</span>
               </a>
            </li>
            <li class="sidebar-item ">
               <a class="sidebar-link" href="?page=history">
               <span class="align-middle"><i class="fas fa-history"></i> History</span>
               </a>
            </li>
            <li class="sidebar-item ">
               <a class="sidebar-link" href="?page=userfav">
                  
                  <span class="align-middle"><i class="fas fa-heart"></i> Favourites</span>
               </a>
            </li>

            <li class="sidebar-item">
               <a class="sidebar-link" href="?page=rateus">
                  <span class="align-middle"><i class="fas fa-star"></i> Rate Us</span>
               </a>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link" href="?page=termsandcond">
                <span class="align-middle"><i class="fas fa-book"></i> Terms and Conditions</span>
               </a>
            </li>
            <div class="sidebar-cta">
            </div>
         </div>
      </nav>
      <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
         <a class="sidebar-toggle js-sidebar-toggle">
         <i class="hamburger align-self-center"></i>
         </a>
         <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
               <li class="nav-item">
                  <a class="nav-link  userdropdown d-sm-inline-block" href="javascript:void(0)"  >
                  <img src="<?php  echo SITE_PROFILE_IMAGE.$row['profile']; ?>" class="avatar img-fluid rounded me-1" alt="<?php echo getCurrentUserName(); ?>" onerror="this.onerror=null;this.src=`<?php  echo $row['profile']; ?>`;">
                  <span class="text-dark"><?php echo getCurrentUserName(); ?></span>
                  <span> <i class="fas fa-caret-down"></i> </span>
                  </a>
                  <div class="card" style="width: 7rem;" id="userDrop">
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a class="dropdown-item" href="?page=userlogout">Log out</a></li>
                     </ul>
                  </div>
               </li>
            </ul>
         </div>
      </nav>