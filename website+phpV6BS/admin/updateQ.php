<?php 
session_start();
include("includes/header.php"); 
include('init.php');

if (!isset($_SESSION['id'])) { redirect("login.php");} 

//code disabling the need for the user to confirm resubmission
//ref (http://stackoverflow.com/questions/30586869/confirm-form-resubmission-bypass)
header('Cache-Control: no cache'); //no cache

session_cache_limiter('must-revalidate');
?>
<style>

.collection {
    width: 600px;
    min-height: 100px;
    margin: 0 auto;
    background-color: #fff;
    padding: 10px 50px 50px 50px;
    border-radius: 50px;
    border: 2px solid #cbcbcb;
    box-shadow: 10px 15px 5px #cbcbcb;
}

.collection h1{
    font-family: sans-serif;
    background-color: #57636a;
    font-size: 30px;
    text-align: center;
    color: #fff;
    padding: 2px 0px;
    border-radius: 50px;
    margin-top: 15px;
}

.question {
    font-size:20px; 
    margin-bottom:10px;
    margin-left:20px;
}

.answers {
    font-size:20px; 
    margin-bottom:10px;
    margin-left:20px;
}

.buttona {
    margin-top: 30px;
}

#btn0 {
    background-color: #57636e;
    width: 300px;
    font-family: sans-serif;
    font-size: 30px;
    color: #fff;
    border: 2px solid #cbcbcb;
    border-radius: 50px;
    margin: 10px 40px 10px 0px;
    padding:  10px 10px;
}

#btn0:hover {
    cursor: pointer;
    background-color: #779997;
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

    <?php 

$id = $_REQUEST['varname'];
$uid = $_POST['uid'];
$cseID = $_POST['crsID'];
$subject = $_POST['subject'];
$topic = $_POST['topic'];
//Using @ before the function "mysql_real_escape_string", so as not to display the DEPRICIATED error in the page.
//In the future I will use PDO instead of myaql.
//I'm using the "mysql_real_escape_string" function so the user can enter puntuation makes such as ' !
$question = @mysql_real_escape_string($_POST['question']);
$answer1 = $_POST['answerOne'];
$answer2 = $_POST['answerTwo'];
$answer3 = $_POST['answerThree'];
$answer4 = $_POST['answerFour'];

$sql = "UPDATE questions SET fld_CourseID = '$cseID', fld_Subject='$subject', fld_Topic='$topic', fld_UserID = '$uid', fld_Question='$question', fld_OptionOne='$answer1',
        Fld_OptionTwo = '$answer2', fld_OptionThree = '$answer3', fld_optionFour = '$answer4' WHERE questions.fld_QuestionID = $id";
        
$result = mysqli_query($conn, $sql);

$sql = "SELECT ALL fld_QuestionID, fld_UserID, fld_Question, fld_CourseID, fld_Subject, fld_Topic, fld_OptionOne, 
                    Fld_OptionTwo, fld_OptionThree, fld_optionFour
        FROM questions WHERE fld_QuestionID='$id' ORDER BY fld_QuestionID";

$result = mysqli_query($conn, $sql);
    
echo "<br>
      <br>
      <h1 class='headerlect'; style='text-align:center;'>Your question has been updated and now reads:</h1>
      <br>
      <br>";
      
echo '<div id="collectionsDiv">';
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

echo"
        <form action='editQuestion.php' method='post' name='Q' id='edit'>                       
        
    <div class='collection' id='{$row['fld_QuestionID']}'>
        <div class='collection-hover'>
            <h1>Question was created by User ID {$row['fld_UserID']}</h1>
        </div>
        <div class='collection-hover'>
            <h1>Question was given Course ID {$row['fld_CourseID']}</h1>
        </div>
        <div class='collection-hover'>
            <h1>Subject: {$row['fld_Subject']} \ Topic: {$row['fld_Topic']}</h1>
        </div>
        <hr style ='margin-top: 20px'>
        <br>
        <div class='collection-hover'>
            <p class='question' name='' id=''>{$row['fld_Question']}</p>
        </div>
        <br>
        <div class='collection-hover'>
            <p class='answers' name='' id=''>{$row['fld_OptionOne']}</p>
        </div>
        <div class='collection-hover'>
            <p class='answers' name='' id=''>{$row['Fld_OptionTwo']}</p>
        </div>
        <div class='collection-hover'>
            <p class='answers' name='' id=''>{$row['fld_OptionThree']}</p>
        </div>
        <div class='collection-hover'>
            <p class='answers' name='' id=''>{$row['fld_optionFour']}</p>
        </div>
        <hr style ='margin-top: 20px'>
        </div>
        </form>
        <br>
        <br>";
    }
echo '</div>';
      
mysqli_free_result($result);

?>
<p style="text-align:center;">
      <input class="buttona" id="btn0" type="button" value="Go Back to search" onclick="goBack()"></input>
</p>
      <br>
      <br>

<script>
function goBack() {
    window.history.go(-2);
}
</script>
    
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>