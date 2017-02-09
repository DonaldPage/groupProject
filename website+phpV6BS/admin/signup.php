<?php 
require_once("includes/header.php");
require_once("init.php");



if (isset($_POST['submit'])) {
	
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

}


	//GETS THE INFORMATION FROM THE URL
	 $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	// //IF THE STRING POSSITION(strops) INCLUDES A ERROR STATEMENT
	 if(strpos($url, 'error=empty')!== false){

		$message = "Fill out all the fields!";
	
	} elseif(strpos($url, 'error=username')!== false){
		
		$message = "Username already exists!";

	} elseif(strpos($url, 'error=enter_valid_ID')!== false){

		$message = "Please ender a valid ID number";

	} else {

		$message = "";
	}


?>


<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $message; ?></h4>
	
<form action="includes/signupFilter.inc.php" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username">

</div>

<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>

<div class="form-group">
	<a href="login.php">Already have an account?</a>
		
</div>

</form>


</div>