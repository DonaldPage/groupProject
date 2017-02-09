<?php 
session_start();
include("includes/header.php"); 
include('init.php');

if (!isset($_SESSION['id'])) { redirect("login.php");} 

//GETS THE INFORMATION FROM THE URL
     $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    // //IF THE STRING POSSITION(strops) INCLUDES A ERROR STATEMENT
     if(strpos($url, 'error=empty')!== false){

        $message = "Fill out all the fields!";

    } else {

        $message = "";
    }
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

    
    <div class="col-md-12">
                    
                    <div class="col-md-12 col-md-offset-2">
                        <h1>To enter a new question for your students</h1>
                        <h4>complete the whole form and press "SUBMIT QUESTION"</h4>
                        <br>
                    </div>

            
                <form class="col-md-8 col-md-offset-2" action="includes/insertQuestion.inc.php" method="POST">
                <h2 class="bg-danger col-md-12"><?php echo $message; ?></h2>
                    <br>
                    <br>
                    <div class="form-group">
                    <input class="col-md-6" type="text" name="subject" placeholder="Subject">
                    <input class="col-md-6" type="text" name="topic" placeholder="Topic">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                    <textarea class="form-control" rows="5" cols="70" name="question" placeholder="Question"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                    <h4>Please state option 1 (Correct Answer)</h4>
                    <textarea class="form-control" rows="1" cols="70" name="answer1" placeholder="Option 1"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                    <h4>Please state option 2</h4>
                    <textarea class="form-control" rows="1" cols="70" name="answer2" placeholder="Option 2"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                    <h4>Please state option 3</h4>
                    <textarea class="form-control" rows="1" cols="70" name="answer3" placeholder="Option 3"></textarea>
                    <div>
                    <br>
                    <div class="form-group">
                    <h4>Please state option 4</h4>
                    <textarea class="form-control" rows="1" cols="70" name="answer4" placeholder="Option 4"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                    <h4>Which course is this question for?</h4>
                    <input class="form-control" type="text" name="cseID" placeholder="CourseID">
                    </div>
                    <br>
                    <div class="form-group">
                    <button class="btn btn-primary" type="submit">SUBMIT QUESTION</button>
                    </div>
                </form>
                <br>
                <br>
                <br>
    </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>