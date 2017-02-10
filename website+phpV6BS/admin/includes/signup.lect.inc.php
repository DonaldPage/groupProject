<?php
session_start();
include '../dbh.php';
// TAKES THE TEXT FROM THE INPUT FIELDS AND
// STORES THEM IN A VARIABLE
$first = $_POST['firstname'];
$last = $_POST['lastname'];
$uid = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$cnfPwd = $_POST['confPassword'];
$subject = $_POST['subject'];
$secSubject = $_POST['secSubject'];

// ERROR HANDLING, CHECKING IF ALL FIELDS HAVE TEXT IN THEM
if (empty($first)){
	header ("Location: ../signup.php?error=empty");
	exit();
}
// ERROR HANDLING, CHECKING IF ALL FIELDS HAVE TEXT IN THEM 
if (empty($last)){
	header ("Location: ../signup.php?error=empty");
	exit();
}
if (empty($email)){
	header ("Location: ../signup.php?error=empty");
	exit();
}
if (empty($pwd)){
	header ("Location: ../signup.php?error=empty");
	exit();
}
if ($pwd != $cnfPwd){
        header ("Location: ../signup.php?error=error");
	exit();
}
if (empty($subject)){
	header ("Location: ../signup.php?error=empty");
	exit();
}
if (empty($secSubject)){
	header ("Location: ../signup.php?error=empty");
	exit();
} else {
        $sql = "SELECT fld_UserID FROM users WHERE fld_UserID='$uid'";
		$result = mysqli_query($conn, $sql); 
		$uidcheck = mysqli_num_rows($result);
	
		if($uidcheck > 0){
			header ("Location: ../signup.php?error=username");
			exit();	
				} else {
					// HASHING THE PASSWORD BEFORE IT'S INSERTED
						$enc_pwd = password_hash($pwd, PASSWORD_DEFAULT);
						// INSERT NEW USER DETAILS INTO DATABASE
						$sql ="INSERT INTO users (fld_UserID,fld_Forename,fld_Surname,fld_Email,fld_Password,fld_Sec_Level,fld_Subject,fld_2ndSubject)
						VALUES ('$uid','$first','$last','$email','$enc_pwd','2','$subject','$secSubject')";
						// EXECUTE THE INSERTION
						$result = mysqli_query($conn, $sql);
						//RETURN THE USER TO THE FRONT PAGE
						header ("Location: ../login.php?success");
        }
}     
?>