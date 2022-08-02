<!DOCTYPE html>
<html lang="en">

<head>
  <!-- meta tags starts -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Imporous Tour  And  Travels</title>
	<link href="view/static/asset/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<!-- meta tags Ends -->
	 <!-- Favicons -->
  <link rel="shortcut icon" href="view/static/asset/logo/apple-touch-icon.png" type="image/svg+xml">
   <!-- favicon ends -->


   <style type="text/css">
     
      /* Sign up form*/
      .forminput{
        position: relative;
      }

      .forminput .formlabel{
        position: absolute;
        top: -20px;
        left: 10px;
        z-index: 1000;
        background-color: #fff;
        padding: 0 6px;
      }

   </style>
 
</head>


<body>
	<section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      <!-- registrations section starts -->
                      <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-4">Sign up</p>
                      
                      <p class="text-danger error text-center"></p>
      
                      <form class="mx-1 mx-md-4" id="signupform">
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0 forminput">
                            <input type="text" id="name" name="name" class="form-control" />
                            <label class="form-label formlabel" for="form3Example1c">Your Name</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0 forminput">
                            <input type="text" id="email" name="email" class="form-control" />
                            <label class="form-label formlabel" for="form3Example3c">Your Email</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0 forminput">
                            <input type="password" id="password" name="password" class="form-control" />
                            <label class="form-label formlabel" for="form3Example4c">Password</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0 forminput">
                            <input type="password" id="confirmpass" name="confirmpass" class="form-control" />
                            <label class="form-label formlabel"  for="form3Example4cd">Repeat your password</label>
                          </div>
                        </div>
      
                        <div class="form-check d-flex justify-content-center mb-3">
                          <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                          <label class="form-check-label" for="form2Example3">
                            I agree all statements in <a href="#">Terms of service</a>
                          </label>
                        </div>
      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
      
                      </form>
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="view/static/asset/images/user-registration.png"
                        class="img-fluid" alt="Sample image">
        <!-- registrations section ends -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

	<script src="view/static/asset/js/app.js"></script>

  <script type="text/javascript">
    
    const login_process_url="register_loginService.php";
    const site_path="http://localhost/crud/";

    $("#signupform").on("submit",function(e){
      e.preventDefault();

      const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

      let name=$("#signupform #name").val().trim();
      let email=$("#signupform #email").val().trim();
      let password=$("#signupform #password").val().trim();
      let confirmpass=$("#signupform #confirmpass").val().trim();
    


      if(name.length<=2 || name.length>=16){
          $(".error").text("Name should 3 to 15 characters long!");
          $("#signupform #name").focus();
          $("#signupform #name").addClass("border-danger");
      }
      else if(!email.match(mailformat)){
        $(".error").text("Invalid Email!");
        $("#signupform #email").focus();
      }
      else if(password!=confirmpass){
        $(".error").text("Password Not Matching!");
        $("#signupform #confirmpass").focus();
      }
      else{
        $.ajax({  
                   type:"POST",  
                   url:login_process_url,  
                   data:$("#signupform").serialize()+"&type=register",
                   success:function(result){
        
                    msg=jQuery.parseJSON(result);

                     if(msg.status=="fail"){
                         $(".error").text(msg.msg);
                     }
                     if(msg.status=="success"){
                       window.location.href=site_path;
                     }
                   }
                   
                  });
      }


    });




  </script>

</body>

</html>