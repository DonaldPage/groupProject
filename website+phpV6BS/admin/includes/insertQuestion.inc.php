<?php
session_start();
include_once ('../init.php');
// TAKES THE TEXT FROM THE INPUT FIELDS AND
// STORES THEM IN A VARIABLE
$subject = $_POST['subject'];
$topic = $_POST['topic'];
//Using @ before the function "mysql_real_escape_string", so as not to display the DEPRICIATED error in the page.
//In the future I will use PDO instead of mySql.
//I'm using the "mysql_real_escape_string" function so the user can enter puntuation makes such as ' !
$question = @mysql_real_escape_string($_POST['question']);
$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];
$answer4 = $_POST['answer4'];
$cseID = $_POST['cseID'];

//Asks if there is a live session named UID.
if (isset($_SESSION['username'])){
	//If there is then hold the info contained in the session (userID) inside a variable.
	$userID = $_SESSION['username'];
}
// ERROR HANDLING, CHECKING IF ALL FIELDS HAVE TEXT IN THEM
if (empty($subject)){
	header ("Location: ../insertQuestion.php?error=empty");
	exit();
}
if (empty($topic)){
	header ("Location: ../insertQuestion.php?error=empty");
	exit();
}
if (empty($question)){
	header ("Location: ../insertQuestion.php?error=empty");
	exit();
}
// ERROR HANDLING, CHECKING IF ALL FIELDS HAVE TEXT IN THEM 
if (empty($answer1)){
	header ("Location: ../insertQuestion.php?error=empty");
	exit();
}
if (empty($answer2)){
	header ("Location: ../insertQuestion.php?error=empty");
	exit();
}
if (empty($answer3)){
	header ("Location: ../insertQuestion.php?error=empty");
	exit();
}
if (empty($answer4)){
        header ("Location: ../insertQuestion.php?error=empty");
	exit();
}
if (empty($cseID)){
        header ("Location: ../insertQuestion.php?error=empty");
	exit();
} else {
    $sql ="INSERT INTO questions (fld_QuestionID,fld_CourseID,fld_Subject,fld_Topic,fld_UserID,fld_Question,fld_OptionOne,Fld_OptionTwo,fld_OptionThree,fld_optionFour) 
           VALUES (NULL,'$cseID','$subject','$topic','$userID','$question','$answer1','$answer2','$answer3','$answer4')";
         
	// EXECUTE THE INSERTION
    $result = mysqli_query($conn, $sql); 

    redirect('../index.php?entry=success');
}

?>
