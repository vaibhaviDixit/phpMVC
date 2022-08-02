<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Imporous Tour  And Travels</title>

	<link href="view/static/asset/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

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
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-2">
							<h1 class="h3">Admin Login</h1>
							
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="view/static/asset/images/user-login.png" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form id="adminloginform">
										<div class="mb-4 forminput">
											<label class="form-label formlabel">Username</label>
											<input class="form-control form-control-lg " type="text" name="uname" placeholder="Enter your Username" />
										</div>
										<div class="mb-4 forminput">
											<label class="form-label formlabel">Password</label>
											<input class="form-control form-control-lg" type="password" name="pass" placeholder="Enter your password" />
											
										</div>
										<div>
											
										</div>
										<div class="text-center mt-3">
											
											<div class="text-center mt-3">
											  <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
											</div>
										
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="view/static/asset/js/app.js"></script>


	<script type="text/javascript">

	const login_process_url="register_loginService.php";
    const admin_panel="http://localhost/crud/?type=admin&page=dash";
		
		$("#adminloginform").on("submit",function(e){
      		e.preventDefault();

        $.ajax({  
                   type:"POST",  
                   url:login_process_url,  
                   data:$("#adminloginform").serialize()+"&type=adminlogin",
                   success:function(result){
                   
                      msg=jQuery.parseJSON(result);

                     if(msg.status=="fail"){
                         $(".error").text(msg.msg);
                     }
                     if(msg.status=="success"){
                       window.location.href=admin_panel;
                     }
                   }
                   
                  });

    });

	</script>

</body>

</html>