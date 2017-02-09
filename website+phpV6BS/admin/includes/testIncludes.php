<!-- Code to find question One -->
<?php
include 'dbh.php';


$qID = 1;

$sql = "SELECT * FROM questions WHERE fld_QuestionID='$qID'";

$result = mysqli_query($conn, $sql); 

$row = mysqli_fetch_assoc($result);

$question1 = $row['fld_Question'];
$Q1opt1 = $row['fld_OptionOne'];
$Q1opt2 = $row['Fld_OptionTwo'];
$Q1opt3 = $row['fld_OptionThree'];
$Q1opt4 = $row['fld_optionFour'];

?>

<!-- Code to find question Two -->
<?php
$qID = 2;

$sql = "SELECT * FROM questions WHERE fld_QuestionID='$qID'";

$result = mysqli_query($conn, $sql); 

$row = mysqli_fetch_assoc($result);

$question2 = $row['fld_Question'];
$Q2opt1 = $row['fld_OptionOne'];
$Q2opt2 = $row['Fld_OptionTwo'];
$Q2opt3 = $row['fld_OptionThree'];
$Q2opt4 = $row['fld_optionFour'];

?>

<!-- Code to find question Three -->
<?php
$qID = 3;

$sql = "SELECT * FROM questions WHERE fld_QuestionID='$qID'";

$result = mysqli_query($conn, $sql); 

$row = mysqli_fetch_assoc($result);

$question3 = $row['fld_Question'];
$Q3opt1 = $row['fld_OptionOne'];
$Q3opt2 = $row['Fld_OptionTwo'];
$Q3opt3 = $row['fld_OptionThree'];
$Q3opt4 = $row['fld_optionFour'];

?>

<!-- Code to find question Four -->
<?php
$qID = 4;

$sql = "SELECT * FROM questions WHERE fld_QuestionID='$qID'";

$result = mysqli_query($conn, $sql); 

$row = mysqli_fetch_assoc($result);

$question4 = $row['fld_Question'];
$Q4opt1 = $row['fld_OptionOne'];
$Q4opt2 = $row['Fld_OptionTwo'];
$Q4opt3 = $row['fld_OptionThree'];
$Q4opt4 = $row['fld_optionFour'];

?>

<!-- Code to find question Five -->
<?php
$qID = 5;

$sql = "SELECT * FROM questions WHERE fld_QuestionID='$qID'";

$result = mysqli_query($conn, $sql); 

$row = mysqli_fetch_assoc($result);

$question5 = $row['fld_Question'];
$Q5opt1 = $row['fld_OptionOne'];
$Q5opt2 = $row['Fld_OptionTwo'];
$Q5opt3 = $row['fld_OptionThree'];
$Q5opt4 = $row['fld_optionFour'];

?>