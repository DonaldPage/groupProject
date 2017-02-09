<?php
session_start();

//Tells the page to include the dbh page
//which allows access to the database.
require_once ("../init.php");
//Variables to hold the values entered in the login input fileds.
//Using the super-global $_POST.
$username = $_POST['username'];
$password = $_POST['password'];

//If nothing is entered then go back to login page and display error message in URL.
if (empty($username) && empty($password)){
	redirect("../login.php?error=invalid_login");
        exit();
}

//If nothing is entered then go back to login page and display error message in URL.
if (empty($password)){
	redirect("../login.php?error=empty_PWD");
        exit();
}
//If nothing is entered then go back to login page and display error message in URL.
if (empty($password)){
	redirect("../login.php?error=empty_PWD");
        exit();
}

//Searches the users table for a match to the value held within $username.
$sql = "SELECT * FROM users WHERE fld_UserID='$username'";
//Executes the query and holds the resluts within $result.
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//Variable that holds the hashed p/w gained from the database.
$hash_password = $row['fld_Password'];
//compares the two hashed results in order to verify password entered at login.
$hash = password_verify($password, $hash_password);

//If the result of password_verify is a 0 there is no match
//If the result is 1 then there is a match.
if ($hash == 0){
    //If there's no match, go to the home page and display an error in the url.
	Redirect ("../login.php?error=invalid_PWD");
} else{
		//If there is a match then run the SELECT query to search for the username and 
		//the matched, hashed password that is contained in $hash-password.
        $sql = "SELECT * FROM users WHERE fld_UserID='$username' AND fld_Password='$hash_password'";
		//Executes the query and holds the results within $result.
        $result = mysqli_query($conn, $sql); 
        
//Asks if the result retched from the users table doesn't match what what is held within $row
	if (!$row = mysqli_fetch_assoc($result)){
		//then echo this to the screen
		Redirect ("../login.php?error=invalid_login");
	} else {
		//Other wise do this.
            $sql = "SELECT * FROM users WHERE fld_UserID='$username'";
			//Executes the query and holds the results within $result.
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
			//holds the security number of the user who has logged in from the results found within $row.
            $secNo = $row['fld_Sec_Level'];
			$userID = $row['fld_UserID'];
			//Asks if the number found within $secNo is equal to 2.
            $_SESSION['id'] = $row['fld_Forename'];
            //Redirects the user to the lecurer page with access to all lecturer privilages.
            $_SESSION['username'] = $row['fld_UserID'];

            $_SESSION['secID'] = $row['fld_Sec_Level'];

            redirect("../index.php");         
	} 

}
?>