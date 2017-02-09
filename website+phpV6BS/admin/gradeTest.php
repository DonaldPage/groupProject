<?php   
include("includes/header.php"); 
include("init.php");
session_start();       
//if (!isset($_SESSION['id'])) { redirect("login.php");} 
         
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           


        <?php include ("includes/top_nav.php"); ?>
        

            
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->



        <?php include ("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

        
        <?php 

        scoreTest($totalCorrect);

        //Asks if there is a live session named username.
        if (isset($_SESSION['username'])){
        //If there is then hold the info contained in the session (userID) inside a variable.
        $userID = $_SESSION['username'];
        }

        //Searching the answers table to see if the user already has any scores for this test.
        $sql = "SELECT * FROM answers WHERE fld_UserID='$userID' AND fld_QuizID='mathQuiz1'";
        //Executes the query.
        $result = mysqli_query($conn, $sql);
        //Fetchest the information associated with the query stored within $result and stores it in a variable $row.
        $row = mysqli_fetch_assoc($result);

        //Creates a variable to hold the amount of attemps the user has recorded within the answers table.
        $testCount  = $row['fld_Test_Taken'];
        //Holds the results of the query within a variable.
        $entryCheck = mysqli_num_rows($result);
        
         ?>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>