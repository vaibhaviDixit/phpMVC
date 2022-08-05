<?php
if(isset($_SESSION['LAST_ACTIVE_TIME'])){
      $_SESSION['LAST_ACTIVE_TIME']=time();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo SITE_NAME; ?></title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="view/static/asset/logo/apple-touch-icon.png" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="view/static/asset/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- owl carousel links -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css'>
  <link rel='stylesheet' href='https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css'>


    
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
      <div class="container">

        <a href="tel:+91<?php echo $adminSocial['phone'];  ?>" class="helpline-box">

          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <div class="wrapper">
            <p class="helpline-title">For Further Inquires :</p>

            <p class="helpline-number">+91 <?php echo $adminSocial['phone'];  ?></p>
          </div>

        </a>

        <a href="<?php echo SITE_PATH; ?>" class="logo">
          <img src="view/static/asset/logo/apple-touch-icon.png" alt="Tourly logo">
        </a>

        <div class="header-btn-group">

     <!--      <button class="search-btn" aria-label="Search">
            <ion-icon name="search"></ion-icon>
          </button> -->

          <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
          </button>

        </div>

      </div>
    </div>

    <div class="header-bottom">
      <div class="container">

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="view/static/asset/logo/apple-touch-icon.png" alt="Tourly logo">
            </a>

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <ul class="navbar-list">

            <li>
              <a href="<?php echo SITE_PATH; ?>" class="navbar-link" data-nav-link>home</a>
            </li>

            <li>
              <a href="<?php echo SITE_PATH; ?>#about" class="navbar-link" data-nav-link>about us</a>
            </li>


            <li>
              <a href="<?php echo SITE_PATH; ?>#package" class="navbar-link" data-nav-link>packages</a>
            </li>

            <li>
              <a href="<?php echo SITE_PATH; ?>#testimonials" class="navbar-link" data-nav-link>Testimonials</a>
            </li>

            <li>
              <a href="<?php echo SITE_PATH; ?>#contact" class="navbar-link" data-nav-link>contact us</a>
            </li>

            <?php if(isset($_SESSION['CURRENT_USER_ID'])){
            ?>
            <li>
              <b><a href="?page=profile" class="navbar-link" data-nav-link>Hi, <?php echo $currentUserDetails['name'];?></a></b>
            </li>
            <?php
               }
               else{
                ?>
                <li>
                  <a href="?page=login" class="navbar-link" data-nav-link>login</a>
                </li>
                <?php
               }
             ?>


          </ul>

        </nav>

      </div>
    </div>

  </header>



