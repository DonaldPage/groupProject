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
    width: 400px;
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

#btn0:focus {
    outline: 0;
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
$uid = $_POST['uid'];
?>
<br>
<br>
<h1 class="headinglect" style="text-align:center;">Below you can veiw and choose to edit each search result for: <?php echo $uid ?></h1>
<br>
<br>
<?php
 
$sql = "SELECT fld_QuestionID, fld_UserID, fld_Question, fld_CourseID, fld_Subject, fld_Topic, fld_OptionOne, 
                    Fld_OptionTwo, fld_OptionThree, fld_optionFour
        FROM questions WHERE fld_UserID='$uid' ORDER BY fld_QuestionID";

$result = mysqli_query($conn, $sql);
    
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

echo"
    <div>
        <form action='editQ.php' method='post' name='Q' id='edit'>                       
        
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
        <br>
        <br>
            <p style='text-align:center;'>
                <input type='hidden' name='varname' value='{$row['fld_QuestionID']}'>
                <input class='buttona'  id='btn0' type='submit' value='Edit Question'></button>
            </p>
        <hr style='margin-top: 50px'>
        </form>
        <br>
        <br>
    </div>";
    }
      
mysqli_free_result($result);
 ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>