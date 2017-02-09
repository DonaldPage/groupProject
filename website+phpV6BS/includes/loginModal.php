<?php

                if (isset($_POST['submit'])) {
                  
                  $username = trim($_POST['username']);
                  $password = trim($_POST['password']);

                }

                //GETS THE INFORMATION FROM THE URL
                   $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  // //IF THE STRING POSSITION(strops) INCLUDES A ERROR STATEMENT
                   if(strpos($url, 'error=empty_UID')!== false){

                    $message = "No user ID has been entered!";
                  
                  } elseif(strpos($url, 'error=empty_PWD')!== false){
                    
                    $message = "No password has been entered!";

                  } elseif(strpos($url, 'error=invalid_PWD')!== false){

                    $message = "The password you entered" . "<br>" . "does not match our records";

                  } elseif (strpos($url, 'error=invalid_login')!== false) {
                    
                    $message = "Username or password are incorrect";

                  } else {

                    $message = "";
                  }


                ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enter Login Details</h4>
              </div>
              <div class="modal-body">
              
                <h4 class="bg-danger"><?php echo $message; ?></h4>
                  
                <form id="login-id" action="login.inc.php" method="post">
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                      </div> 
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3"> 
                      <div class="form-group">
                        <a href="signup.php">Don't have an account?</a>
                      </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3"> 
                      <div class="modal-footer">
                        <button type="button" type="submit" class="btn btn-primary col-md-6">Login</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                   </div> 
                </form>
           
              </div><!-- Modal-body -->
                
            </div>
          </div>
        </div><!-- /.Modal -->

 