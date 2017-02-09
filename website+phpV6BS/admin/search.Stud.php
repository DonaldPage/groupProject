<?php 
session_start();
include("includes/header.php"); 
include('init.php');

if (!isset($_SESSION['id'])) { redirect("login.php");} 


?>
<style>

.input {

    font-size: 20px;

}

</style>
       <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


<?php include("includes/top_nav.php"); ?>



            <!-- Brand and toggle get grouped for better mobile display -->
            
            


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            

<?php include("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>


        <div class="col-md-12" id="page-wrapper">

<!--<form action="jointest2.php" method="POST">
Course: <input type="text" name="course"><br>
<input type="submit">-->
<div class="col-md-12">
	<h1>Please select which course you would like to see:</h1>
</div>

<form class="col-md-12" action="" method="POST">
<input type="radio" name="course" value="1"> Maths <br>
<input type="radio" name="course" value="2"> English <br>
<br>
<input class="btn btn-primary" type="submit">
<br>
<br>
</form>
<br>
<br>

</body>
</html>
<?php

$course= !empty($_POST['course']) ? $_POST['course'] : ' ';

//$test = "SELECT lecturers.fld_Subject from groupproject.lecturers WHERE lecturers.fld_Subject = '1'";
//echo $test;
//echo $course;
		?>
		<html>
		<br>
		
		</html>
		<?php
if(!$course ) {
	echo "Please enter a course";
}
else/*if("lecturers.fld_Subject" == $course)*/ {
	//mysql_select_db($conn,'groupproject');

$sql = "SELECT users.fld_UserID,users.fld_Surname, users.fld_Forename, users.fld_Subject, users.fld_2ndSubject,course.fld_CourseID, course.fld_Course
        FROM users, course
        WHERE ((course.fld_Course = users.fld_Subject) AND (course.fld_CourseID = '$course')) OR ((course.fld_Course = users.fld_2ndSubject) AND (course.fld_CourseID = '$course'))";

$result = mysqli_query($conn, $sql);
if(! $result )
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		
    echo "Student ID:{$row['fld_UserID']}  <br> ".
         "Surname: {$row['fld_Surname']} <br> ".
		 "Forename: {$row['fld_Forename']} <br>".
         //"CourseID: {$row['fld_CourseID']} <br> ".
		 //"Student Subject: {$row['fld_Subject']} <br> ".
		 "Course Name: {$row['fld_Course']}  <br>".
         "--------------------------------<br>";
	} 

}
?>

<?php
//echo "Fetched data successfully\n";
mysqli_close($conn);


?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>

