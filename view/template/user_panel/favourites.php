
<section class="packages" id="packages" style="padding: 0; margin: 0;">	
			<main class="content">

				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Favourites</strong></h1>


<div class="box-container">
  <?php

if(count($favArray)>0){
      foreach ($favArray as $key => $value) {

        $pckgId=$value['pckgId'];
            $pckgRow=$packagesModel->getpackageById($pckgId);

             if(count($pckgRow)>0){
                ?>
               
          <div class="box">
             <img src="<?php echo SITE_PACKAGE_IMAGE.$pckgRow['packagePhoto'];  ?>" alt="">
              <div class="content">
                  <h4><i id="map" class="fa fa-map-marker"></i> <?php  echo $pckgRow['packageName']; ?> </h4>
                  <p><?php  echo $pckgRow['packageDesc']; ?></p>
                  <div class="stars">
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star "></i>
                      <i class="fa fa-star "></i>
                  </div>
                  <div class="price">&#8377; <?php  echo $pckgRow['packagePrice']; ?> <span style="font-size: .4rem;color:gray;">/person /night</span></div>
                  <div class="view-like">
                    <a class="view-details" href="<?php echo SITE_PATH.'templates/'; ?>viewDetails/<?php echo $pckgRow['id'];  ?>"><i class="fa fa-eye"></i> View Details</a>
                    <div class="like-wrapper">
                     <a href="javascript:void(0);" data-id="<?php echo $pckgRow['id'] ?> " class="like-button <?php
                        $active='remove';
                        foreach ($favArray as $key => $value) {

                           $pckgId=$value['pckgId'];
                           if($pckgRow['id']==$pckgId){ echo "is-active"; $active='remove'; }
                           
                        }

                        ?>" onclick="manageFav('<?php echo $pckgRow['id']; ?>','<?php echo $active; ?>')" >
                        <i class="material-icons not-liked bouncy">favorite_border</i>
                        <i class="material-icons is-liked bouncy">favorite</i>
                        <span class="like-overlay"></span>
                      </a>
                  </div>
                  </div>
                   <?php 
                      if(isset($_SESSION['CURRENT_USER_ID'])){
                  ?>
                  <a href="<?php echo SITE_PATH.'templates/'; ?>bookTour/<?php echo $pckgRow['id'];  ?>"><button class="book-btn">Book Now</button></a>
                      <?php
                    }
                    else{
                      ?>
                       <a href="<?php echo SITE_PATH.'templates/'; ?>login"><button class="book-btn">Book Now</button></a>
                      <?php
                    }
                  ?>
              </div>
          </div>
          <!-- box ends -->

          <?php

              }
          }
        }
        else{
                  echo "<h3>You haven't favorite tours!</h3>";
        }           
      ?>
</div>


					</div>
					</main>

					</section>

