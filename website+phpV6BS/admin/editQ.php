<?php 
session_start();
include("includes/header.php"); 
include('init.php');

if (!isset($_SESSION['id'])) { redirect("login.php");} 


?>
<style>

.collection {
    width: 800px;
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
    padding: 6px 0px;
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

.editButton{
    width: 20%;
    border: 4px solid #999 ;
    border-radius:10px;
    font-family: Arial Black;
    font-size: 20px;
    padding: 6px;
    background-color: #fff;
    color: #999;
}

.editButton:hover{
    background-color: #f2f0a4;

}

.inputTitle{
    font-family: sans-serif;
    font-size: 20px;
    margin-bottom: 10px;
    margin-left: 10px;
}

.line3{
    font-family: sans-serif;
    font-size: 20px;
    width: 80%;
    border: 4px solid #999;
    border-radius:10px;
    padding: 10px;
    background-color: #eee;
    margin-bottom: 20px;
}

.line3:focus{
    background-color: #f2f0a4;
    outline: 0;
}

.buttona {
    margin-top: 30px;
}

#btn0 {
    background-color: #57636e;
    width: 600px;
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

$id = $_REQUEST['varname'];
//echo "Your registration is: ".$var_value.".";
$sql = "SELECT *  FROM questions WHERE fld_QuestionID = $id ";
//Executes the query and holds the resluts within $result.
$result = mysqli_query($conn, $sql);


if($result->num_rows == 1)
{
while($row = $result->fetch_assoc())
{
    
?>

<br>
        <div class="col-md-12 col-md-offset-1">
            <div class="collection">
                <form action="updateQ.php" method="POST">
                    <div class='collection-hover'>
                        <h1>Question was created by User ID <input class='line1' type='text' name='uid' placeholder='uid' value="<?php echo $row['fld_UserID']; ?>"></input></h1>
                    </div>
                    <div class='collection-hover'>
                        <h1>Subject: <input class="line1" type='text' name='subject' placeholder='Subject' value="<?php echo $row['fld_Subject']; ?>">
                            </h1>
                    </div>
                    <div class='collection-hover'>
                        <h1>Topic: <input class="line1" type='text' name='topic' placeholder='Topic' value="<?php echo $row['fld_Topic']; ?>"></h1>
                    </div>
                    <div class='collection-hover'>
                        <h1>Question was given Course ID <input class="line1" type='text' name='crsID' placeholder='Course ID' value="<?php echo $row['fld_CourseID']; ?>"></input></h1>
                    </div>
                    <hr style ="margin-top: 20px">
                    <br>
                    <div class='collection-hover'>
                        <p class="inputTitle">Edit Question</p>
                            <textarea class='line3' rows='5' cols='70' name='question' placeholder='Question'><?php echo $row['fld_Question']; ?></textarea>
                    </div>
                    <div class='collection-hover'>
                        <p class='inputTitle'>Edit Answer One (correct answer)</p>
                        <input class='line3' type='text' name='answerOne' placeholder='Answer One' value="<?php echo $row['fld_OptionOne']; ?>"></input>
                    </div>
                    <div class='collection-hover'>
                        <p class='inputTitle'>Edit Answer Two</p>
                        <input class='line3' type='text' name='answerTwo' placeholder='Answer Two' value="<?php echo $row['Fld_OptionTwo']; ?>"></input>
                    </div>
                    <div class='collection-hover'>
                        <p class='inputTitle'>Edit Answer Three</p>
                        <input class='line3' type='text' name='answerThree' placeholder='Answer Three' value="<?php echo $row['fld_OptionThree']; ?>"></input>
                    </div>
                    <div class='collection-hover'>
                        <p class='inputTitle'>Edit Answer Four</p>
                        <input class='line3' type='text' name='answerFour' placeholder='Answer Four' value="<?php echo $row['fld_optionFour']; ?>"></input>
                    </div>
                    <hr style ='margin-top: 10px'>
                </div>
                <br>
                <br>
                <p style='text-align:center;'>
                    <input type='hidden' name='varname' value="<?php echo $row['fld_QuestionID']; ?>">
                    <input class='buttona' id='btn0' type='submit' value='Submit Question Edit'></button>
                </p>
            </form>
            <br>
            <br>
    </div>
</div>
<?php
}


}
?>
<?php
mysqli_free_result($result);

?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>