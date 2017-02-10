<?php 
require_once("includes/header.php");
require_once("init.php");


if (isset($_POST['submit'])) {
	
	$username = trim($_POST['username']);
	$firstname = trim($_POST['firstname']);
	$lastname = trim($_POST['lastname']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$confPassword = trim($_POST['confPassword']);
	$subject = trim($_POST['subject']);
	$secSubject = trim($_POST['secSubject']);

}

?>


<div class="col-md-4 col-md-offset-3">


<!--<h4 class="bg-danger">Please log in</h4>-->
	
<form action="includes/signup.stud.inc.php" method="post">
	
<div class="form-group" action="">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username">

</div>

<div class="form-group">
	<label for="firstname">Forename(s)</label>
	<input type="text" class="form-control" name="firstname">
</div>

<div class="form-group">
	<label for="lastname">Last Name</label>
	<input type="text" class="form-control" name="lastname">
</div>

<div class="form-group">
	<label for="email">E-Mail(s)</label>
	<input type="email" class="form-control" name="email">
</div>

<div class="form-group">
	<label for="password">Enter a Password</label>
	<input type="password" class="form-control" name="password">
</div>

<div class="form-group">
	<label for="confPassword">Confirm your password</label>
	<input type="password" class="form-control" name="confPassword">
</div>

<div class="form-group">
	<label for="subject">Enter Your Subject</label>
	<input type="text" class="form-control" name="subject">
</div>

<div class="form-group">
	<label for="lastname">Enter Your 2nd Subject</label>
	<input type="text" class="form-control" name="secSubject">
</div>

<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>

<div class="form-group">
	<a href="login.php">Already have an account?</a>
		
</div>

</form>


</div>