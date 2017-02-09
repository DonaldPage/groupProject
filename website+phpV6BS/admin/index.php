<?php 
session_start();
include("includes/header.php"); 
include('init.php');

if (!isset($_SESSION['id'])) { redirect("login.php");} 


?>

       <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


<?php include("includes/top_nav.php"); ?>



            <!-- Brand and toggle get grouped for better mobile display -->
            
            


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            

<?php include("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">

        <?php 

        $secLevel = $_SESSION['secID'];

        switch ($secLevel) {
            case 1:
                # code...
                break;

            case 2:
                include('lect.content.php');
                break;
            
            case 3:
                include('stud.content.php');
                break;

        }

        ?>


            

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>