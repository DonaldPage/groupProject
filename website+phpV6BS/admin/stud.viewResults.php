<?php 
session_start();
include("includes/header.php"); 
include('init.php');

if (!isset($_SESSION['id'])) { redirect("login.php");} 


?>
<style>

li{
    list-style-type: none;
}
.results {
    width: 600px;
    min-height: 100px;
    margin: 0 auto;
    background-color: #fff;
    padding: 10px 50px 50px 50px;
    border-radius: 50px;
    border: 2px solid #cbcbcb;
    box-shadow: 10px 15px 5px #cbcbcb;
}

.results h1{
    font-family: sans-serif;
    background-color: #57636a;
    font-size: 30px;
    text-align: center;
    color: #fff;
    padding: 2px 0px;
    border-radius: 50px;
    margin-top: 15px;
}

.buttona{
    width: 20%;
    border: 4px solid #999 ;
    border-radius:10px;
    font-family: Arial Black;
    font-size: 20px;
    padding: 6px;
    background-color: #fff;
    color: #999;
}

.buttona:hover{
    background-color: #f2f0a4;

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
 
                
<!-- Form displaying question 1, actioning grade.php which holds the SELECT querys to fetch both the questions and the answers from the questions table within the database -->

    <?php

        //Asks if there is a live session named UID.
    if (isset($_SESSION['username'])){
        //If there is then hold the info contained in the session (userID) inside a variable.
        $userID = $_SESSION['username'];
    }

    //Searching the answers table to see if the user already has any scores for this test.
    $sql = "SELECT fld_ResultOne, fld_ResultTwo, fld_ResultThree, fld_ResultFour, fld_ResultFive FROM answers
            WHERE fld_UserID='$userID'";

    //Executes the query.
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);

    $score1 = $row['fld_ResultOne'];
    $score2 = $row['fld_ResultTwo'];
    $score3 = $row['fld_ResultThree'];
    $score4 = $row['fld_ResultFour'];
    $score5 = $row['fld_ResultFive'];

    $entryCheck = mysqli_num_rows($result);

    if ($entryCheck > 0) {
    echo "<div id='collectionsDiv'>
            <h1 class='page-header col-md-offset-2'>
                            {$_SESSION['id']} these are the results you have on record
                        </h1>
          <br>
          <br>
          <br>
          <div class='results'>
          <h1>Your First Result</h1>
          <br>
              <p style='font-size:30px; text-align:center;'>Better luck next time!</p>'
              
              <hr style ='margin-top: 10px'>
              
          <br>
              <p style='font-size:40px; text-align:center; margin-top:30px;' 
               id='results'>You scored: $score1 / 5 correct</p>

        </div>
    <hr style='margin-top: 50px'>

        <br>
        <br>
        <div class='results'>
        <h1>Your Second Result</h1>
        <br>
              <p style='font-size:30px; text-align:center;'>Better luck next time!</p>'
              
              <hr style ='margin-top: 10px'>
              
                    <br>
                    <p style='font-size:40px; text-align:center; margin-top:30px;' id='results'>You scored: $score2 / 5 correct</p>

        </div>
    <hr style='margin-top: 50px'>

        <br>
        <br>
        <div class='results'>
        <h1>Your Third Result</h1>
        <br>
              <p style='font-size:30px; text-align:center;'>Better luck next time!</p>'
              
              <hr style ='margin-top: 10px'>
              
                    <br>
                    <p style='font-size:40px; text-align:center; margin-top:30px;' id='results'>You scored: $score3 / 5 correct</p>

        </div>
    <hr style='margin-top: 50px'>

        <br>
        <br>
        <div class='results'>
        <h1>Your Fourth Result</h1>
        <br>
              <p style='font-size:30px; text-align:center;'>Better luck next time!</p>'
              
              <hr style ='margin-top: 10px'>
              
                    <br>
                    <p style='font-size:40px; text-align:center; margin-top:30px;' id='results'>You scored: $score4 / 5 correct</p>

        </div>
    <hr style='margin-top: 50px'>

        <br>
        <br>
        <div class='results'>
        <h1>Your Fith Result</h1>
        <br>
              <p style='font-size:30px; text-align:center;'>Better luck next time!</p>'
              
              <hr style ='margin-top: 10px'>
              
                    <br>
                    <p style='font-size:40px; text-align:center; margin-top:30px;' id='results'>You scored: $score5 / 5 correct</p>

        </div>
        <br>
        <br>";
    } else {

        echo "<p style='font-size:30px; text-align:center;'>You do not have any test        results, please take a test in one of your subjects.</p>'";
    
    }

mysqli_free_result($result);
?>

<p style="text-align:center;">
      <input class="buttona" id="btn0" type="button" value="Go Back to Home" onclick="goBack()"></input>
</p>
      <br>
      <br>

<script>
function goBack() {
    window.history.go(-1);
}
</script>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>