<!--     PROFILE      -->

<main class="content">
<div class="container-fluid">


          <div class="mb-3">
            <h1 class="h3 d-inline align-middle"><strong>Profile</strong></h1>
          
          </div>
          <div class="row">
        
            <div class="col-md-4 col-xl-3">
              <div class="card mb-3">
                  
                <div class="card-header">
                  <h5 class="card-title mb-0">Profile</h5>
                </div>
                <div class="card-body text-center">

                    <img src="<?php  echo SITE_PROFILE_IMAGE.$currentUserDetails['profile']; ?>" alt="user" class="img-fluid  mb-2 img-thumbnail" onerror="this.onerror=null;this.src=`<?php  echo $currentUserDetails['profile']; ?>`;"/>
      

                  <h5 class="card-title mb-0"><?php   echo $currentUserDetails['name']; ?></h5>

                   <form method="post" enctype="multipart/form-data">
                       <label type="button" for="userProfile" class="badge btn btn-primary btn-sm mt-2 p-1 rounded-pill">Change Profile <i class="fas fa-greater-than"></i></label>
                        <input class="form-control form-control-sm" type="file" id="userProfile" name="userProfile" accept="image/*" onchange="this.form.submit();" hidden>
                               
                   </form>

                </div>
                
              </div>
            </div>

            <div class="col-md-8 col-xl-9">
              <div class="card mb-3 w-100">
                <div class="card-header">
                  <h5 class="card-title mb-0">Basic Infromation</h5>
                </div>
                  <div class="card-body text-center">

                  <table class="table" style="text-align: left;">
                    <tbody>
                      
                      <tr>
                        <th scope="row">Name</th>
                        <td><?php   echo $currentUserDetails['name']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">Phone Number</th>
                        <td><?php   echo $currentUserDetails['mobile']; ?></td>
                      </tr>

                       <tr>
                        <th scope="row">Email</th>
                        <td><?php   echo $currentUserDetails['email']; ?></td>
                      </tr>

                       <tr>
                        <th scope="row">Address</th>
                        <td><?php   echo $currentUserDetails['address']; ?></td>
                      </tr>

  
                    </tbody>
                  </table>
                  

                </div>
              </div>
          
            </div>

          </div>

                        <div class="card w-100">
                          <div class="card-header">Edit Profile</div>
                    
                    <div class="card-body h-100">

                           <form method="post" id="changeUserProfileForm" name="changeUserProfileForm">
                             <div id="recaptcha-container"></div>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                  <label for="userName" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="userName" id="userName" value="<?php   echo $currentUserDetails['name']; ?>">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-5 mb-3">
                                  <label for="userPhone" class="form-label">Phone</label>
                                  <input type="text" class="form-control" name="userPhone" id="userPhone" value="<?php echo $currentUserDetails['mobile']; ?>">
                                </div>
                                 
                             </div>

                            <div class="row">
                                <div class="col mb-3">
                                  <label for="userAddress" class="form-label">Address</label>
                                  <textarea class="form-control" rows="3" id="userAddress" name="userAddress">
                                    <?php   echo $currentUserDetails['address']; ?>
                                  </textarea>
                                </div>
                            </div>
                            <button class="btn btn-success" name="updateUserDetails" type="submit" id="changeSaveBtn">Save Changes</button>
                            </form>
                         </div>
                      </div> 
                      <!-- card ends -->
                 

</div>
</main>