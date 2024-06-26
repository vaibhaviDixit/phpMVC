
  <div class="fixed-header">
      <ul class="social-list">

          <li>
            <a href="<?php echo $adminSocial['fb'];  ?>" class="social-link" target="_blank">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://wa.me/+91<?php echo $adminSocial['whatsapp'];  ?>" class="social-link" target="_blank">
              <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
          </li>

          <li>
            <a href="<?php echo $adminSocial['youtube'];  ?>" class="social-link" target="_blank">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

          <li>
            <a href="<?php echo $adminSocial['insta'];  ?>" class="social-link" target="_blank">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="<?php echo $adminSocial['twitter'];  ?>" class="social-link" target="_blank">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

        </ul>
    </div>

  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title">Journey to explore world</h2>

          <p class="hero-text">
            Explore exotic places through our amazing travel deals
          </p>

          <div class="btn-group">
            <a href="#about"><button class="btn btn-primary">Learn more</button></a>

            <a href="#package"><button class="btn btn-secondary">Book now</button></a>
          </div>

        </div>
      </section>





      <!-- 
        - #TOUR SEARCH
      -->
<!-- 
      <section class="tour-search">
        <div class="container">

          <form action="" class="tour-search-form">

            <div class="input-wrapper">
              <label for="destination" class="input-label">Search Destination*</label>

              <input type="text" name="destination" id="destination" required placeholder="Enter Destination"
                class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="people" class="input-label">Pax Number*</label>

              <input type="number" name="people" id="people" required placeholder="No.of People" class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="checkin" class="input-label">Checkin Date**</label>

              <input type="date" name="checkin" id="checkin" required class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="checkout" class="input-label">Checkout Date*</label>

              <input type="date" name="checkout" id="checkout" required class="input-field">
            </div>

            <button type="submit" class="btn btn-secondary">Inquire now</button>

          </form>

        </div>
      </section> -->


<!-- #ABOUT -->
  <section class="about" id="about">
          <p class="section-subtitle">We can never be less than the best.</p>
          <h2 class="h2 section-title">About Us</h2>
          <div class="">
            <p class="about-us" style="width: 85%;text-align: justify;margin: 0 auto;">
              <?php

              $sentences=explode(".", $adminSocial['about']);

              for ($i=0; $i<count($sentences); $i++) { 

                  if(($i+1)%4==0){
                    echo "<br><br>";
                  }
                  if($sentences[$i]!=""){
                    echo $sentences[$i].".";
                  }
              }

               ?>
            </p>
          </div>
  </section>


      <!-- 
        - #PACKAGE
      -->

      <section class="package" id="package">
        <div class="container">

          <p class="section-subtitle">Popular Packages</p>

          <h2 class="h2 section-title">Checkout Our Packages</h2>

          <p class="section-text">
            Travel makes one modest, you see what a tiny place you occupy in the world.
          </p>

          <ul class="package-list">

            <?php
              //check package array is empty or not
              if(count($packagesArray)>0){
                
                foreach($packagesArray as $pckgRow) {
                  //package start
                  ?>
                    <li class="singlePackage">
              <div class="package-card">

                <figure class="card-banner">
                 <a href="?page=book&id=<?php  echo $pckgRow['id']; ?>"> <img src="<?php echo SITE_PACKAGE_IMAGE.$pckgRow['img1'];  ?>" alt="tour" loading="lazy"> </a>
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title"><?php  echo $pckgRow['packageName']; ?></h3>

                  <p class="card-text">
                   <?php  echo substr(strip_tags(html_entity_decode($pckgRow['packageDesc'])),0,175); ?>....
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text"> <?php  echo $pckgRow['packageDuration']; ?> Days</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>
                        <p class="text"> <?php  echo $pckgRow['packageLocation']; ?></p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="starsreviews">(<?php if(isset($pckgRow['noOfReviews'])){echo $pckgRow['noOfReviews']; }else{echo "0";} ?> reviews)</p>

                    <div class="card-rating">
                      <?php 
                      if(isset($pckgRow['noOfReviews']))
                      {
                        $st=intval($pckgRow['numRating']);
                        for ($i=0; $i < $st; $i++) { 
                          echo '<ion-icon name="star" style="color:orange;"></ion-icon>';
                        }
                        $gray=5-$st;
                        for($j=0;$j<$gray;$j++){
                          echo '<ion-icon name="star" style="color:gray;"></ion-icon>';
                        }
                      }
                    ?>
                    </div>

                  </div>

                  <p class="price">
                    <?php  echo $pckgRow['packagePrice']; ?>
                    <span>/ per person</span>
                  </p>

                  <a href="?page=book&id=<?php  echo $pckgRow['id']; ?>"><button class="btn btn-secondary">Book Now</button></a>

                </div>

              </div>
            </li>
                  <?php
                  //package ends
                }
              }
            ?>

          </ul>

          <button class="btn btn-primary" id="loadMorePackages">View All Packages</button>

        </div>
      </section>





      <!-- 
        - #TESTIMONIALS
      -->

      <section class="testimonials" id="testimonials">
        <div class="container">

          <p class="section-subtitle">What they say</p>

          <h2 class="h2 section-title">Testimonials</h2>

          <div class="testimonialRow">
       <!-- card starts -->
      <div class="col-sm-12">
        <div  id="customers-testimonials" class="owl-carousel"> 
      <?php 

        foreach($testimonialsArray as $ratings){
              
          ?>
         
          <div class="item">
            <div class="shadow-effect">
                <img class="img-circle" src="<?php echo SITE_PROFILE_IMAGE.$ratings['profile']; ?>" alt="">
                <h4 class="testimonial-name"><?php echo $ratings['name']; ?></h4>
                <div style="display: flex; margin:10px 0;">
                <?php 
                  $st=intval($ratings['stars']);
                  for ($i=0; $i < $st; $i++) { 
                    echo '<ion-icon name="star" style="color:orange;"></ion-icon>';
                  }
                  $gray=5-$st;
                  for($j=0;$j<$gray;$j++){
                    echo '<ion-icon name="star" style="color:gray;"></ion-icon>';
                  }
                ?>
              </div>
                <p><i class="fa fa-quote-left"></i><?php echo $ratings['description']; ?></p> 
            </div>
          </div>

      <!-- card ends -->
      <?php } ?>
      
        </div>
      </div>
    </div>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="cta" id="contact">
        <div class="container">

          <div class="cta-content">
            <p class="section-subtitle">Call To Action</p>

            <h2 class="h2 section-title">Ready For Unforgatable Travel. Remember Us!</h2>

            <p class="section-text">
              Please let us know how we can help you efficiently.
            </p>
          </div>

          <a href="tel:+91<?php echo $adminSocial['phone'];  ?>"><button class="btn btn-secondary">Contact Us !</button></a>

        </div>
      </section>

    </article>
  </main>



