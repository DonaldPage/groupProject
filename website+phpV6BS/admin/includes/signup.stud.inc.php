<?php
session_start();
include '../dbh.php';
// TAKES THE TEXT FROM THE INPUT FIELDS AND
// STORES THEM IN A VARIABLE
$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$cnfPwd = $_POST['cnfPwd'];
$subject = $_POST['subject'];
$secSubject = $_POST['2ndsubject'];

// ERROR HANDLING, CHECKING IF ALL FIELDS HAVE TEXT IN THEM
if (empty($first)){
	header ("Location: ../signup.php?error=empty");
	exit();
}
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
} else {
        $sql = "SELECT fld_UserID FROM users WHERE fld_UserID='$uid'";
		$result = mysqli_query($conn, $sql); 
		$uidcheck = mysqli_num_rows($result);
	
		if($uidcheck > 0){
			header ("Location: ../student.php?error=username");
			exit();	
				} else {
					// HASHING THE PASSWORD BEFORE IT'S INSERTED
					$enc_pwd = password_hash($pwd, PASSWORD_DEFAULT);
					// INSERT NEW USER DETAILS INTO DATABASE
					$sql ="INSERT INTO users (fld_UserID,fld_Forename,fld_Surname,fld_Email,fld_Password,fld_Sec_Level,fld_Subject,fld_2ndSubject)
						VALUES ('$uid','$first','$last','$email','$enc_pwd','3','$subject','$secSubject')";
					// EXECUTE THE INSERTION
					$result = mysqli_query($conn, $sql); 
					header ("Location: ../GPindex.php?success");
        }
}    
?>