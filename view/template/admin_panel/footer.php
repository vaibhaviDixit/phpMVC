<footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="<?php echo SITE_PATH; ?>" target="_blank"><strong><?php echo SITE_NAME; ?></strong></a> &copy;
              </p>
            </div>
          
          </div>
        </div>
</footer>
</div>
</div>
      <!-- footer ends here -->
    

  
<script src="<?php echo SITE_PATH; ?>view/static/asset/ckeditor/ckeditor.js"></script>
  <script src="<?php echo SITE_PATH; ?>view/static/asset/js/jquery.min.js"></script>
  <script src="<?php echo SITE_PATH; ?>view/static/asset/js_admin/app.js"></script>
  <script src="<?php echo SITE_PATH; ?>view/static/asset/js/datatables.js"></script>
  <script src="<?php echo SITE_PATH; ?>view/static/asset/js/sweetalert.min.js"></script>
  <script src="<?php echo SITE_PATH; ?>view/static/asset/bootstrap.min.js"></script>


<script type="text/javascript">
  

const site_path="http://localhost/crud/";
let logoutUrl=site_path+"?type=admin&page=logout"

function checkTime(){

    $.ajax(
            {  
                       type:"POST",  
                       url:"autoLogout.php",  
                       data:"type=checktime",
                       success:function(result){
                           if(result!=null){
                              let resp=jQuery.parseJSON(result);
                              if(resp.type=="logout"){
                                window.location.href=logoutUrl;
                              }
                          } 
                       }
                       
    });
}


$(document).ready(function(){
 setInterval(checkTime,1000);
});


</script>
  <script type="text/javascript">

    $(document).ready( function () {
      $('#dttable').DataTable();
  } );

    CKEDITOR.replace('placedesc');


   function previewImage(id){

    document.querySelector("#"+id).addEventListener("change",function(e){

        if(e.target.files.length==0){
          return;
        }
        let file=e.target.files[0];
        let url=URL.createObjectURL(file);
        document.querySelector("#preview_"+id+" img").src=url;

    });

   }

   previewImage("img_1");
   previewImage("img_2");
   previewImage("img_3");
   previewImage("img_4");
   previewImage("img_5");
   previewImage("img_6");

  </script>
 

  <script>


        function showBarGraph()
        {
            {
                $.post("bardata.php",
                function (result)
                {

                     let data=jQuery.parseJSON(result);
                     var earnings =[];
                     var lb=[];
                     
                     for (var i in data['data2']) {
                        earnings.push(data['data2'][i]);
                     }
                     for (var k in data['data1']) {
                        lb.push(data['data1'][k]);
                     }


                     var bardata = {
                        labels:lb,
                        datasets: [{
                          label: "This year",
                          backgroundColor:"#34495E",
                          borderColor: window.theme.primary,
                          hoverBackgroundColor: window.theme.primary,
                          hoverBorderColor: window.theme.primary,
                          data:earnings,
                          barPercentage: .75
                        }]
                      };

                    var graphTarget =document.getElementById("chartjs-bar");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: bardata,
                        options: {
                          maintainAspectRatio: false,
                          legend: {
                            display: false
                          },
                          scales: {
                            yAxes: [{
                              gridLines: {
                                display: false
                              },
                              stacked: false,
                              ticks: {
                                stepSize: 5000
                              }
                            }],
                            xAxes: [{
                              stacked: false,
                              gridLines: {
                                color: "transparent"
                              }
                            }]
                          }
                        }
                        
                    });
                });
            }
        }
  </script>

  <script>


     $(document).ready(function () {
            showGraph();
             showBarGraph();
        });


        function showGraph()
        {
            {
                $.post("bookingdata.php",
                function (result)
                { 
                    let data=jQuery.parseJSON(result);
                    var bookCount = [];
                    for (var i in data) {
                        bookCount.push(data[i]);
                    }
                     var chartdata = {
                      //dont modify this sequence
                        labels: ["Todays", "Online", "Offline", "Pending","Confirmed"],
                        datasets: [
                            {
                                label: 'Bookings',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: bookCount,
                                  backgroundColor: [
                                    window.theme.primary,
                                    window.theme.warning,
                                    "#C39BD3",
                                    window.theme.danger,
                                    "#246e17"
                                  ],
                                  borderColor: "transparent"
                            }
                        ]
                    };

                    var graphTarget =document.getElementById("chartjs-pie");

                    var barGraph = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata
                        
                    });
                });
            }
        }
  </script>
  

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
      var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
      document.getElementById("datetimepicker-dashboard").flatpickr({
        inline: true,
        prevArrow: "<span title=\"Previous month\">&laquo;</span>",
        nextArrow: "<span title=\"Next month\">&raquo;</span>",
        defaultDate: defaultDate
      });
    });

    
        
        $(".userdropdown").click(function(){
            
            $("#userDrop").toggle();
        });     


        $(".descriptionDropDown").click(function(){
            
            $(".packageDescription").toggle();
        });  

        $(document).on('click', '.descriptionDropDown', function(e) {
              
              $(".packageDescription").hide();
              let id=$(this).attr("data-id");
              $("#packageDescription_"+id).show();

        });

        $(document).on('click', '.closeDrop', function(e) {
              $(".packageDescription").hide();

        });


        $( "#changePassFrom" ).submit(function( event ) {  

            event.preventDefault(); 
            oldp=$( "#oldPass" ).val();
            newp=$( "#newPass" ).val(); 
            renewp=$( "#renewp" ).val(); 

            if ( oldp=== "" || newp=== "" || renewp==="") {  
              $( "#passMsg" ).text( "All fields are mandatory" ).show();  
              return;  
            }
            if(newp!==renewp){
                 $( "#repassMsg" ).text( "Password not matching!" ).show();  
              return;  
            }

              jQuery.ajax({
                  url:'changeAdminpass.php',
                  type:'post',
                  data:"oldPass="+oldp+"&newPass="+newp,
                  success:function(result){
                    msg=jQuery.parseJSON(result);
                    if(msg.action=="success"){
                        $( "#passMsg" ).text( "Password Changed Successfully" ).show();
                         $( "#changePassFrom" )[0].reset();
                    }
                    else{

                        $( "#passMsg" ).text( "Incorrect old password" ).show();
                    }

                  }

              }); 

        });  




  </script>



</body>
</html>