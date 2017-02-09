<?php   
include("includes/header.php"); 
include("init.php");
session_start();       
if (!isset($_SESSION['id'])) { redirect("login.php");} 
include 'dbh.php';
require_once("includes/testIncludes.php");
         
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

            li{
                list-style-type: none;
            }

            .questionBox {
                width: 600px;
                min-height: 100px;
                margin: 0 auto;
                background-color: #fff;
                padding: 10px 50px 50px 50px;
                border-radius: 50px;
                border: 2px solid #cbcbcb;
                box-shadow: 10px 15px 5px #cbcbcb;
                
            }

            .questionBox h1{
                font-family: sans-serif;
                background-color: #57636a;
                font-size: 30px;
                text-align: center;
                color: #fff;
                padding: 2px 0px;
                border-radius: 50px;
                margin-top: 15px;
            }

            .SubmitButton{
                width: 20%;
                border: 4px solid #999 ;
                border-radius:10px;
                font-family: Arial Black;
                font-size: 20px;
                padding: 6px;
                background-color: #fff;
                color: #999;
            }

            .SubmitButton:hover{
                background-color: #f2f0a4;

            }

            input[type=radio]:not(old){
              width     : 2em;
              margin    : 0;
              padding   : 0;
              font-size : 1em;
              opacity   : 0;
            }

            input[type=radio]:not(old) + label{
              display      : inline-block;
              line-height  : 1.5em;
              font-size:20px; 
              margin-bottom:10px;
            }

            input[type=radio]:not(old) + label > span{
              display: inline-block;
              width: 0.875em;
              height: 0.875em;
              margin: 0.25em 0.5em 0.25em 0.25em;
              border: 0.0625em solid rgb(192,192,192);
              border-radius: 0.25em;
              background: rgb(224,224,224);
              background-image: -moz-linear-gradient(rgb(240,240,240),rgb(224,224,224));
              background-image: -ms-linear-gradient(rgb(240,240,240),rgb(224,224,224));
              background-image: -o-linear-gradient(rgb(240,240,240),rgb(224,224,224));
              background-image: -webkit-linear-gradient(rgb(240,240,240),rgb(224,224,224));
              background-image: linear-gradient(rgb(240,240,240),rgb(224,224,224));
              vertical-align: bottom;
            }

            input[type=radio]:not(old):checked + label > span{
              background-image: -moz-linear-gradient(rgb(224,224,224),rgb(240,240,240));
              background-image: -ms-linear-gradient(rgb(224,224,224),rgb(240,240,240));
              background-image: -o-linear-gradient(rgb(224,224,224),rgb(240,240,240));
              background-image: -webkit-linear-gradient(rgb(224,224,224),rgb(240,240,240));
              background-image: linear-gradient(rgb(224,224,224),rgb(240,240,240));
            }

            input[type=radio]:not(old):checked + label > span > span{
              display: block;
              width: 0.5em;
              height: 0.5em;
              margin: 0.125em;
              border: 0.0625em solid rgb(115,153,77);
              border-radius: 0.125em;
              background: rgb(153,204,102);
              background-image: -moz-linear-gradient(rgb(179,217,140),rgb(153,204,102));
              background-image: -ms-linear-gradient(rgb(179,217,140),rgb(153,204,102));
              background-image: -o-linear-gradient(rgb(179,217,140),rgb(153,204,102));
              background-image: -webkit-linear-gradient(rgb(179,217,140),rgb(153,204,102));
              background-image: linear-gradient(rgb(179,217,140),rgb(153,204,102));
            }
            </style>

            <body>

            <br>
            <?php
            // Uses the information stored within the session to display a personalized welcome message to every user.
            echo "<p align='center' style='font-size:40px;'>Welcome ".$_SESSION['id']." to your maths quiz</p>";
            ?>

            <div>
            <br>
            <h2 align='center' style='font-size:20px;'>Answer all of the questions, ensuring you have made a choice for every question.</br>
                                                       There is no time limit, so take your time and begin when your ready!<h2>
            </div>
             
            <!-- Form displaying question 1, actioning grade.php which holds the SELECT querys to fetch both the questions and the answers from the questions table within the database -->
            <br>
            <br>

            <div class="questionBox">
            <form action="grade.php" method="post" id="quiz">
            <h1>Question 1</h1>
            <hr style ="margin-top: 20px">
            <li>
            <?php
            //Using the result of the SELECT query (contents of fld_Question) held within $question1.
            echo "<p style='font-size:20px; margin-left:50px;'>$question1</p>
                  <br>";
            ?>

                <div>
                    <!-- Creates the radio buttons for the user to select their answer (all named the same so the next
                         page can record the selection, no matter what choice is made. -->
                    <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A"></input>
                    <!-- Displays the question, held within a variable created in the actioned .php file -->
                    <label for="question-1-answers-A"><span><span></span></span><?php echo "A)  $Q1opt1";?></label>
                </div>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B"></input>
                    <label for="question-1-answers-B"><span><span></span></span><?php echo "B)  $Q1opt2";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C"></input>
                    <label for="question-1-answers-C"><span><span></span></span><?php echo "C)  $Q1opt3";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D"></input>
                    <label for="question-1-answers-D"><span><span></span></span><?php echo "D)  $Q1opt4";?></label>
                </div>

            </li>
            <hr style="margin-top: 10px">

            </div>
            <br>
            <br>

            <!-- Form to display question 2 -->
            <div class="questionBox">
            <form action="grade.php" method="post" id="quiz">
            <h1>Question 2</h1>
            <hr style ="margin-top: 20px">
            <li>
            <?php
            //Using the result of the SELECT query (contents of fld_Question) held within $question2.
            echo "<p style='font-size:20px; margin-left:50px;'>$question2</p>
                    <br>";
             ?>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A"></input>
                    <label for="question-2-answers-A"><span><span></span></span><?php echo "A)  $Q2opt3";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B"></input>
                    <label for="question-2-answers-B"><span><span></span></span><?php echo "B)  $Q2opt2";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C"></input>
                    <label for="question-2-answers-C"><span><span></span></span><?php echo "C)  $Q2opt1";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D"></input>
                    <label for="question-2-answers-D"><span><span></span></span><?php echo "D)  $Q2opt4";?></label>
                </div>

            </li>
            <hr style="margin-top: 10px">

            </div>
            <br>
            <br>

            <!-- Form to display question 3 -->
            <div class="questionBox">
            <form action="grade.php" method="post" id="quiz">
            <h1>Question 3</h1>
            <hr style ="margin-top: 20px">
            <li>
            <?php
            //Using the result of the SELECT query (contents of fld_Question) held within $question2.
            echo "<p style='font-size:20px; margin-left:50px;'>$question3</p>
                    <br>";
            ?>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A"></input>
                    <label for="question-3-answers-A"><span><span></span></span><?php echo "A)  $Q3opt3";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B"></input>
                    <label for="question-3-answers-B"><span><span></span></span><?php echo "B)  $Q3opt1";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C"></input>
                    <label for="question-3-answers-C"><span><span></span></span><?php echo "C) $Q3opt2";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D"></input>
                    <label for="question-3-answers-D"><span><span></span></span><?php echo "D) $Q3opt4";?></label>
                </div>

            </li>
            <hr style="margin-top: 10px">

            </div>

            <br>
            <br>

            <!-- Form to display question 4 -->
            <div class="questionBox">
            <form action="grade.php" method="post" id="quiz">
            <h1>Question 4</h1>
            <hr style ="margin-top: 20px">
            <li>
            <?php
            //Using the result of the SELECT query (contents of fld_Question) held within $question2.
            echo "<p style='font-size:20px; margin-left:50px;'>$question4</p>
                    <br>";
             ?>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A"></input>
                    <label for="question-4-answers-A"><span><span></span></span><?php echo "A)  $Q4opt1";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B"></input>
                    <label for="question-4-answers-B"><span><span></span></span><?php echo "B)  $Q4opt3";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C"></input>
                    <label for="question-4-answers-C"><span><span></span></span><?php echo "C)  $Q4opt2";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D"></input>
                    <label for="question-4-answers-D"><span><span></span></span><?php echo "D)  $Q4opt4";?></label>
                </div>

            </li>
            <hr style="margin-top: 10px">

            </div>
            <br>
            <br>

            <!-- Form to display question 5 -->
            <div class="questionBox">
            <form action="grade.php" method="post" id="quiz">
            <h1>Question 5</h1>
            <hr style ="margin-top: 20px">
            <li>
            <?php
            //Using the result of the SELECT query (contents of fld_Question) held within $question2.
            echo "<p style='font-size:20px; margin-left:50px;'>$question5</p>
                    <br>";
             ?>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A"></input>
                    <label for="question-5-answers-A"><span><span></span></span><?php echo "A)  $Q5opt4";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B"></input>
                    <label for="question-5-answers-B"><span><span></span></span><?php echo "B)  $Q5opt2";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C"></input>
                    <label for="question-5-answers-C"><span><span></span></span><?php echo "C)  $Q5opt1";?></label>
                </div>
                
                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D"></input>
                    <label for="question-5-answers-D"><span><span></span></span><?php echo "D)  $Q5opt3";?></label>
                </div>

            </li>
            <hr style="margin-top: 10px">
            </div>

            <br>
            <br>
            <p style="text-align:center;"><input class="SubmitButton" type="submit" value="Submit Quiz"></button></p>
            <br>
            <br>
            <br>
            <br>

            </body>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>