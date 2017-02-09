<?php
session_start();
include '../dbh.php';
include("../init.php");
//Creates a variable to hold the ID entered by the user.
$username = $_POST['username'];
//Error handler
//If nothing is entered then go back to sign up page and display error message in URL.
if (empty($username)){
	redirect("../signup.php?error=empty");
        exit();
}
//Error hander
//Search for the username entered by the "new user" 
$sql = "SELECT fld_UserID FROM users WHERE fld_UserID='$username'";
		//Executes the query.
		$result = mysqli_query($conn, $sql);
		//Creates a variable to hold the result of the query.
		$usernamecheck = mysqli_num_rows($result);
		//Error handler
		//If the users ID already exists in the users table then go back to sign up page and display error message in URL.
		if($usernamecheck > 0){
			redirect("../signup.php?error=username");
			exit();
				//Otherwise, check the length of the new users ID.
				} else {
					//Error handler
					//If the new users ID is 6 characters long, then assume the new user is a lecturer
					//and direct them to the lecturers signup form.
					if (strlen($username) == 6){
						redirect("../lect.signup.php");
						  //If the new users ID is 8 characters long, then assume the new user is a student
						  //and direct them to the students signup form.
						} elseif (strlen($username) == 8){
							      redirect("../stud.signup.php");
								  //Otherwise, go back to the signup page and display an error message in the URL.
								 } else {
										redirect("../signup.php?error=enter_valid_ID");
										}


}

?>