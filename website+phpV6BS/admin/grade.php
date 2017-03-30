<?php   
include("includes/header.php"); 
include("init.php");
session_start();       
if (!isset($_SESSION['id'])) { redirect("login.php");} 
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           


        <?php include ("includes/top_nav.php"); ?>
        

            
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->



        <?php include ("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

  <style>

    body{
        background-color: #222222;
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
        font-size: 40px;
        text-align: center;
        color: #fff;
        padding: 2px 0px;
        border-radius: 50px;
        margin-top: 15px;
    }

    .ExitButton{
        width: 20%;
        border: 4px solid #999 ;
        border-radius:10px;
        font-family: Arial Black;
        font-size: 20px;
        padding: 6px;
        background-color: #fff;
        color: #999;
    }

    .ExitButton:hover{
        background-color: #f2f0a4;
    }
</style>
<?php
    //ref: https://css-tricks.com/building-a-simple-quiz/
    //Holds the answers from the test page within these variables (also containing the answers "id").
    $answer1 = $_POST['question-1-answers'];
    $answer2 = $_POST['question-2-answers'];
    $answer3 = $_POST['question-3-answers'];
    $answer4 = $_POST['question-4-answers'];
    $answer5 = $_POST['question-5-answers'];
    
    //Creates a variable and sets the value to 0.
    $totalCorrect = 0;
    
    //If the "id" of the answer is matches "A", for example, then increment 
    //the total score by 1. This happens evertime the question is asked.
    if ($answer1 == "A") { $totalCorrect++; }
    if ($answer2 == "C") { $totalCorrect++; }
    if ($answer3 == "B") { $totalCorrect++; }
    if ($answer4 == "A") { $totalCorrect++; }
    if ($answer5 == "C") { $totalCorrect++; }
    
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
    //$testCount  = $row['fld_Test_Taken'];
    //Holds the results of the query within a variable.
    //$entryCheck = mysqli_num_rows($result);
    
    //If the total score is less than 4, then display a message of bad luck.
    if($totalCorrect < 4){
        ?>
        <br>
        <br>
        <div class="results">
        <h1>Your resluts</h1>
        <?php 
        echo "<br>
              <p style='font-size:30px; text-align:center;'>Better luck next time!</p>";
              ?>
              <hr style ="margin-top: 10px">
              <?php
              //Displays the total score (held within a variable) out of the total number of questions.
              echo "<br>
                    <p style='font-size:40px; text-align:center; margin-top:30px;' id='results'>You scored: $totalCorrect / 5 correct</p>";

              $ins = "INSERT INTO answers (fld_QuizID, fld_CourseID, fld_UserID, fld_Score) VALUES 
              ('1', '1', '$userID','$totalCorrect')";

              $end = mysqli_query($conn, $ins);
            //Within the paren if statement, check if the user has a row of results.
            /*if ($entryCheck > 0){
                //Uses the value of $testCount to decide what happens in each case.
                switch ($testCount) {
                    case 1:
                    //If the value in $testCount == 1 then UPDATE the row in the answers table that corresponds with user ID from the SESSION.
                    //Also increase the amount of times the user has taken the test to 2 and UPDATE the second result field with the users score.
                    $sql = "UPDATE answers SET fld_Test_Taken = '2', fld_ResultTwo = '$totalCorrect'
                            WHERE answers. fld_UserID = $userID";
                    //Executes the query.
                    $result = mysqli_query($conn, $sql);
                    echo "<br>
                          <br>
                          <hr style ='margin-top: 10px'>
                          <p style='font-size:20px; text-align:center; margin-top: 10px;'id='results'>Your score has been recorded</p>";
                          ?>
                          </div>
                          <br>
                          <br>
                          <form action="index.php">
                          <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                          </form>
                          <br>
                          <br>
                          <?php 
                        break;
                    case 2:
                    $sql = "UPDATE answers SET fld_Test_Taken = '3', fld_ResultThree = '$totalCorrect'
                            WHERE answers. fld_UserID = $userID";
                    //Executes the query.
                    $result = mysqli_query($conn, $sql); 
                    echo "<br>
                          <br>
                          <hr style ='margin-top: 10px'>
                          <p style='font-size:20px; text-align:center; margin-top: 10px;'id='results'>Your score has been recorded</p>";
                          ?>
                          </div>
                          <br>
                          <br>
                          <form action="index.php">
                          <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                          </form>
                          <br>
                          <br>
                          <?php 
                        break;
                    case 3:
                    $sql = "UPDATE answers SET fld_Test_Taken = '4', fld_ResultFour = '$totalCorrect'
                            WHERE answers. fld_UserID = $userID";
                    //Executes the query.
                    $result = mysqli_query($conn, $sql);
                    echo "<br>
                          <br>
                          <hr style ='margin-top: 10px'>
                          <p style='font-size:20px; text-align:center; margin-top: 10px;'id='results'>Your score has been recorded</p>";
                          ?>
                          </div>
                          <br>
                          <br>
                          <form action="index.php">
                          <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                          </form>
                          <br>
                          <br>
                          <?php 
                        break;
                    case 4:
                    $sql = "UPDATE answers SET fld_Test_Taken = '5', fld_ResultFive = '$totalCorrect'
                            WHERE answers. fld_UserID = $userID";
                    //Executes the query.
                    $result = mysqli_query($conn, $sql);
                    echo "<br>
                          <br>
                          <hr style ='margin-top: 10px'>
                          <p style='font-size:20px; text-align:center; margin-top: 10px;'id='results'>Your score has been recorded</p>";
                          ?>
                          </div>
                          <br>
                          <br>
                          <form action="index.php">
                          <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                          </form>
                          <br>
                          <br>
                          <?php
                        break;
                    default:
                    //Otherwise make a new entry for this user to record QuizID, the users ID and the score from this test.
                    $sql = "INSERT INTO answers (fld_Key,fld_QuizID,fld_Test_Taken,fld_UserID,fld_ResultOne)
                        VALUES (NULL,'mathQuiz1','1','$userID','$totalCorrect')";
                    //Executes the query.
                    $result = mysqli_query($conn, $sql);
                    echo "<br>
                          <br>
                          <p style='font-size:20px; margin-left:100px;'id='results'>Your score has been recorded</p>";
                          ?>
                          </div>
                          <br>
                          <br>
                          <form action="index.php">
                          <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                          </form>
                          <br>
                          <br>
                          <?php 
                }//close of switch

            }//Close of: if ($entryCheck > 0)
    } else {
        ?>
        <br>
        <br>
        <div class="results">
        <h1>Your resluts</h1>
        <?php 
        echo "<br>
              <p style='font-size:30px; text-align:center;'>Well done!</p>";
              ?>
              <hr style ="margin-top: 10px">
              <?php
              //Displays the total score (held within a variable) out of the total number of questions.
              echo "<br>
                    <p style='font-size:40px; text-align:center; margin-top:30px;' id='results'>You scored: $totalCorrect / 5 correct</p>";
            
            if ($entryCheck > 0){
            
            switch ($testCount) {
                case 1:
                $sql = "UPDATE answers SET fld_Test_Taken = '2', fld_ResultTwo = '$totalCorrect'
                        WHERE answers. fld_UserID = $userID";
                //Executes the query.
                $result = mysqli_query($conn, $sql);
                echo "<br>
                      <br>
                      <hr style ='margin-top: 10px'>
                      <p style='font-size:20px; text-align:center; margin-top: 10px;'id='results'>Your score has been recorded</p>";
                          ?>
                          </div>
                          <br>
                          <br>
                          <form action="index.php">
                          <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                          </form>
                          <br>
                          <br>
                          <?php 
                    break;
                case 2:
                $sql = "UPDATE answers SET fld_Test_Taken = '3', fld_ResultThree = '$totalCorrect'
                        WHERE answers. fld_UserID = $userID";
                
                $result = mysqli_query($conn, $sql); 
                echo "<br>
                      <br>
                      <hr style ='margin-top: 10px'>
                      <p style='font-size:20px; text-align:center; margin-top: 10px;'id='results'>Your score has been recorded</p>";
                          ?>
                          </div>
                          <br>
                          <br>
                          <form action="index.php">
                          <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                          </form>
                          <br>
                          <br>
                          <?php 
                    break;
                case 3:
                $sql = "UPDATE answers SET fld_Test_Taken = '4', fld_ResultFour = '$totalCorrect'
                        WHERE answers. fld_UserID = $userID";
                //Executes the query.
                $result = mysqli_query($conn, $sql);    
                echo "<br>
                      <br>
                      <hr style ='margin-top: 10px'>
                      <p style='font-size:20px; text-align:center; margin-top: 10px;'id='results'>Your score has been recorded</p>";
                          ?>
                          </div>
                          <br>
                          <br>
                          <form action="index.php">
                          <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                          </form>
                          <br>
                          <br>
                          <?php 
                    break;
                case 4:
                $sql = "UPDATE answers SET fld_Test_Taken = '5', fld_ResultFive = '$totalCorrect'
                        WHERE answers. fld_UserID = $userID";
                //Executes the query.
                $result = mysqli_query($conn, $sql); 
                echo "<br>
                      <br>
                      <hr style ='margin-top: 10px'>
                      <p style='font-size:20px; text-align:center; margin-top: 10px;'id='results'>Your score has been recorded</p>";
                          ?>
                          </div>
                          <br>
                          <br>
                          <form action="index.php">
                          <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                          </form>
                          <br>
                          <br>
                          <?php 
                    break;
                default:
                //Otherwise make a new entry for this user to record QuizID, the users ID and the score from this test.
                $sql = "INSERT INTO answers (fld_Key,fld_QuizID,fld_Test_Taken,fld_UserID,fld_ResultOne)
                       VALUES (NULL,'mathQuiz1','1','$userID','$totalCorrect')";
                //Executes the query.
                $result = mysqli_query($conn, $sql);
                echo "<br>
                      <br>
                      <p style='font-size:20px; margin-left:100px;'id='results'>Your score has been recorded</p>";
                      ?>
                      </div>
                      <br>
                      <br>
                      <form action="index.php">
                      <p style="text-align:center;"><input class="ExitButton" type="submit" value="EXIT QUIZ"></input></p>
                      </form>
                      <br>
                      <br>
                    <?php 
            }//close of switch*/

        //}//Close of: if ($entryCheck > 0)
        
    }//Close of else
?>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>