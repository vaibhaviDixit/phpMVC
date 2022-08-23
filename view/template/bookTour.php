<?php

require_once("model/packagesModel.php");
$packagesModel=new packagesModel();

   if(isset($_GET['id'])){
     $pckId=$_GET['id'];
      $packagesRow=$packagesModel->getpackageById($pckId);
      $canGiveReview=$packagesModel->canGiveReview($pckId);

      if(count($packagesRow)>0){
        $packagePrice=$packagesRow['packagePrice'];
        $total=$packagesRow['packagePrice'];

        $off=$packagesRow['discount'];
        $distype=$packagesRow['disType'];
        $offval=$packagesRow['discount'];

        if($distype=='cash'){
          $offval.="&#8377;";
          $offtype="cash";
          $finalPrice=intval($total)-intval($off);
        }
        else{
          $offval.="%";
          $offtype="per";
          $finalPrice=intval($total)-((intval($off)/100)*intval($total));
        }


      }
      else{
        redirect(SITE_PATH);
      }
   }
   else{
    redirect(SITE_PATH);
   }



   ?>
    <section class="book" id="book">

      <div class="booking">


          
          <div class="">

            <div class="tourtitle">
              <h5 class="packagetitle"><?php  echo $packagesRow['packageName']; ?></h5>
              <p class="d-flex fs-sm"><ion-icon name="location"></ion-icon> <?php  echo $packagesRow['packageLocation']; ?>&emsp;
              <ion-icon name="time"></ion-icon> <span id="noOfDays"><?php  echo $packagesRow['packageDuration']; ?></span>&nbsp;days / <?php  echo intval($packagesRow['packageDuration'])-1; ?> nights

              </p>
            
            </div>

             <iframe style="width: 100%; height: 400px;" src="<?php echo str_replace('watch?v=','embed/',$packagesRow['link']); ?>"
                 title="YouTube video player" frameborder="0" 
                 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                 allowfullscreen >     
             </iframe>

            <div class="image_slider owl-carousel">
                
                <div class="item owlitem">
                  <img src="<?php echo SITE_PACKAGE_IMAGE.$packagesRow['img1'];  ?>" alt="tour" loading="lazy">
                </div>

                <div class="item owlitem">
                  <img src="<?php echo SITE_PACKAGE_IMAGE.$packagesRow['img2'];  ?>" alt="tour" loading="lazy">
                </div>

                <div class="item owlitem">
                  <img src="<?php echo SITE_PACKAGE_IMAGE.$packagesRow['img3'];  ?>" alt="tour" loading="lazy">
                </div>

                <div class="item owlitem">
                  <img src="<?php echo SITE_PACKAGE_IMAGE.$packagesRow['img4'];  ?>" alt="tour" loading="lazy">
                </div>

                <div class="item owlitem">
                  <img src="<?php echo SITE_PACKAGE_IMAGE.$packagesRow['img5'];  ?>" alt="tour" loading="lazy">
                </div>

                <div class="item owlitem">
                  <img src="<?php echo SITE_PACKAGE_IMAGE.$packagesRow['img6'];  ?>" alt="tour" loading="lazy">
                </div>


            </div>
          </div>
          <div class="row"> 
            <div class="tourdescription" id="left_container">

              <?php echo html_entity_decode($packagesRow['packageDesc']); ?>

                                      
            </div>

            <div class="">

              <div id="right_container" class="fs-14">
                  
                  <table class="w-100">
                    <form  method="get">
                    <p id="offBlock"><?php echo $offval; ?> OFF</p>
                      
                      <input type="hidden" name="page" value="checkout">
                      <input type="hidden" name="offval" id="offval" value="<?php echo $off; ?>">
                      <input type="hidden" name="offtype" id="offtype" value="<?php echo $offtype; ?>">
                      <input type="hidden" name="package" id="package" value="<?php echo $packagesRow['id']; ?>">
                      <input type="hidden" name="packagePrice" id="packagePrice" value="<?php echo $packagePrice; ?>">
                      <input type="hidden" name="noofchild" id="noofchild" value="0">
                       <input type="hidden" name="noofadult" id="noofadult" value="1">
                       <input type="hidden" name="finalAmt" id="finalAmt" value="<?php echo $finalPrice; ?>">
                       <input type="hidden" name="subtotal" id="subtotal" value="<?php echo $total; ?>">
                        <input type="hidden" name="checkout" id="checkout" value="">
                    <tr>
                      <td class="fs-12"><strike>&#8377;<span id="totalPrice" style="display: inline;"><?php echo $total; ?></span></strike></td>
                    </tr>

                    <tr>
                      <td class="bold fs-16">&#8377; <span id="finalPrice" style="display: inline;"><?php echo $finalPrice; ?></span></td>
                    </tr>

                    <tr>
                      <td class="bold fs-16">Date</td>
                      <td><span>
                          <label for="date">Change</label>
                          <input type="date" name="checkin" id="date" required min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">

                        </span>
                      </td>

                    </tr>
                    <tr>
                      <td class="fs-12">
                        <span id="inoutdates"></span>
                      </td>
                    </tr>

                    <tr>
                      <td><span class="bold fs-16">Adults</span><span class="fs-12">(Age 18+)</span></td>
                      <td class="d-flex fs-16">
                          
                         <span class="dec" onclick="adultcount('dec')">-</span>
                          <span class="adults" id="adult_count">1</span>
                          <span class="inc" onclick="adultcount('inc')">+</span>

                      </td>
                    </tr>

                    <tr>
                      <td><span class="bold fs-16">Children</span><span class="fs-12">(Age 1-17)</span></td>
                      <td class="d-flex fs-16">
                          
                          <span class="dec" onclick="childcount('dec')">-</span>
                          <span class="child" id="child_count">0</span>
                          <span class="inc" onclick="childcount('inc')">+</span>

                      </td>
                    </tr>

                    <tr>
                      <td colspan="2">
                      <button class="book-btn" type="submit" name="submit">Book Now</button>
                      </td>
                    </tr>
                  </table>

                  </form>

              </div>
                      
                  
            </div>

          </div>


        </div>

        <!-- user review -->
        <div class="reviews">
            
            <?php

            if($canGiveReview){

            ?>
            <div class="write-review mb-5">
              <h3>Enter your review</h3>
              <br>

              <!-- star rating -->
              <form method="post" id="reviewForm">
                <div class="rating" style="height: auto !important; justify-content: flex-end;">

                  <button class="btn btn-primary" type="submit" name="submit" id="submitPackageReview">Submit</button>

                  <input type="radio" name="rating5" id="rating-5" >
                  <label for="rating-5"></label>
                  <input type="radio" name="rating4" id="rating-4" >
                  <label for="rating-4"></label>
                  <input type="radio" name="rating3" id="rating-3">
                  <label for="rating-3"></label>
                  <input type="radio" name="rating2" id="rating-2" >
                  <label for="rating-2"></label>
                  <input type="radio" name="rating1" id="rating-1" >
                  <label for="rating-1"></label>

                </div>

              </form>
              <!-- star rating -->
            </div>
          <?php 
            }
            else{
              echo "<b style='color:red;'>To give review you should login to account and tour should be booked by you!</b>";
            } 
          ?>



            <div class="display-review">

              <?php 
                $packageReviewArray=$packagesModel->getpackageReviewById($_GET['id']);

                if(count($packageReviewArray)>0){
                   foreach($packageReviewArray as $pckrate){
                
              ?>
                
                <div class="user-rate-card">
                  <div><img src="<?php echo SITE_PROFILE_IMAGE.$pckrate['profile']; ?>"></div>
                  <div>
                    <dt><?php echo $pckrate['name']; ?></dt>
                    <dt class="d-flex">
                      <?php 
                      $st=intval($pckrate['stars']);
                      for ($i=0; $i < $st; $i++) { 
                        echo '<ion-icon name="star" style="color:orange;"></ion-icon>';
                      }
                      $gray=5-$st;
                      for($j=0;$j<$gray;$j++){
                        echo '<ion-icon name="star" style="color:gray;"></ion-icon>';
                      }
                    ?>

                    </dt>

                  </div>
                </div>

              <?php } } ?>

            </div>


        </div>
        <!-- user review ends -->
  
  </section>
   <script src="<?php echo SITE_PATH; ?>view/static/asset/js/jquery.min.js"></script>

<script type="text/javascript">


  $(".header").css("background-color", "#223544");


function adultcount(val){

  let count=parseInt($("#adult_count").text());


  if(val=='inc'){

    if(count>=0 && count<100){
      $("#adult_count").text(count+1);
      $("#noofadult").val(count+1);
    }

  }
  else{
    if(count!=1){
      $("#adult_count").text(count-1);
      $("#noofadult").val(count-1);
    }
  }

  bookingValue();
}


function childcount(val){

  let count=parseInt($("#child_count").text());


  if(val=='inc'){

    if(count>=0 && count<100){
      $("#child_count").text(count+1);
      $("#noofchild").val(count+1);
    }

  }
  else{
    if(count!=0){
      $("#child_count").text(count-1);
      $("#noofchild").val(count-1);
    }
  }
  bookingValue();
}

    $("#date").on("change",function(){

       let date=new Date($(this).val()); 
       let outdate = new Date(date);
       outdate.setDate(outdate.getDate() + (parseInt($("#noOfDays").text())-1));

       let checkin=date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
       let checkout=outdate.getDate()+"/"+(outdate.getMonth()+1)+"/"+outdate.getFullYear();

       let inoutdates=checkin+" - "+checkout;
       $("#inoutdates").text(inoutdates);
       $("#checkout").val(outdate.getFullYear()+"-"+(outdate.getMonth()+1)+"-"+outdate.getDate());

     });
    
    $("#date").trigger("change");
  
  function bookingValue(){

    let packagePrice=parseInt($("#packagePrice").val());//price before OFF (package price per person)
    let finalPrice=parseInt($("#finalPrice").text());//price after OFF    
    let child_count=parseInt($("#child_count").text());//child count 
    let adult_count=parseInt($("#adult_count").text());//adult count

    let offval=parseInt($("#offval").val());//discount value
    let offtype=$("#offtype").val();//discount type

    let childPrice=child_count*(packagePrice/2);
    let adultPrice=adult_count*packagePrice;
    let total=childPrice+adultPrice;

    $("#totalPrice").text(String(total));//strike price
    $("#subtotal").val(total);

    if(offtype=="per"){

      let perOff=Math.round(total-(total*(offval/100)));
      $("#finalPrice").text(perOff);
      $("#finalAmt").val(perOff);
    }
    else{
      let cashOff=Math.round(total-offval);
      $("#finalPrice").text(cashOff);
      $("#finalAmt").val(cashOff);
    }  
  
  }


</script>


          <script type="text/javascript">

              $("#submitPackageReview").on("click",function(e){
                var stars=0;
                let type="packageReview";
                
                r1=$("#rating-1").is(":checked");
                r2=$("#rating-2").is(":checked");
                r3=$("#rating-3").is(":checked");
                r4=$("#rating-4").is(":checked");
                r5=$("#rating-5").is(":checked");

                let pckid=$("#package").val();

                if(r1){stars=1;}
                if(r2){stars=2;}
                if(r3){stars=3;}
                if(r4){stars=4;}
                if(r5){stars=5;}

                if(stars!=0){

                     jQuery.ajax({
                        url:'submitRate.php',
                        type:'post',
                        data:{stars : stars,pckid:pckid,type:type},
                        success:function(result){
                            
                          msg=jQuery.parseJSON(result);
                          if(msg.status=="success"){
                            swal("Thank you!", "Your reviews matters for us!", "success");
                          }
                          $("#reviewForm")[0].reset();

                      }

                    });
                }

            })
          

            


  </script>