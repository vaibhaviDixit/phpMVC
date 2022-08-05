const site_path="http://localhost/crud/";
let logoutUrl=site_path+"?page=userlogout";
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





