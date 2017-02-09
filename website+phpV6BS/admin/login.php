<?php 
require_once ("includes/header.php");
require_once ("init.php");
session_start();



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


<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $message; ?></h4>
	
<form id="login-id" action="includes/login.inc.php" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username">

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>

<div class="form-group">
	<a href="signup.php">Don't have an account?</a>
		
</div>

</form>


</div>