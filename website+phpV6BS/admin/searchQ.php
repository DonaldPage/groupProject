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

    
    <!--Uses the information stored within the session to display a personalized welcome message to every user. -->
    
    <div class="col-md-12 col-md-offset-2">
    <?php
    echo "<h1>OK ".$_SESSION['id'].", first lets find you a question to edit</h1>";
    ?>
    </div>
    <br>
    <br>
    
    <div class="col-md-12 col-md-offset-1">
        <h2>Enter you username to find all of the questions you have entered.</h2>
        <br>
        <br>
        <br>
    </div>

    <div>
        <form class="col-md-6 col-md-offset-2" method="post" action="displayQ.php">
            <input Style="font-size: 20px;" class="input col-md-8" type="text" name="uid" placeholder="Username">
            <br>
            <br>
            <br>
            <input class="btn btn-primary" type="submit" value="SEARCH">
            <br>
            <br>
            <br>
            <br>
        </form> 
    </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>