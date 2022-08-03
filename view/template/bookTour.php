<?php

require_once("model/packagesModel.php");
$packagesModel=new packagesModel();

   if(isset($_GET['id'])){
     $pckId=$_GET['id'];
      $packagesRow=$packagesModel->getpackageById($pckId);
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

              <?php echo $packagesRow['packageDesc']; ?>

                                      
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

                  <!-- <table class="w-100">

                    <tr>
                      <td class="bold fs-16">Apply Coupon</td>
                      <td><span>
                          <input type="text" name="coupon" id="coupon" placeholder="Coupon Code" class="inputstyle">

                        </span>
                      </td>

                    </tr>
                  
                    <tr>
                      <td colspan="2">
                        <a href=""><button class="book-btn">Apply Coupon</button></a>
                      </td>
                    </tr>

                  </table> -->

              </div>
                      
                  
            </div>

          </div>


        </div>
  
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

      let perOff=total-(total*(offval/100));
      $("#finalPrice").text(perOff);
      $("#finalAmt").val(perOff);
    }
    else{
      let cashOff=total-offval;
      $("#finalPrice").text(cashOff);
      $("#finalAmt").val(cashOff);
    }  
  
  }


</script>
